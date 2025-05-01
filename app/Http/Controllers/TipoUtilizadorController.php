<?php

namespace App\Http\Controllers;

use App\Models\TipoUtilizador;
use App\Models\Historico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class TipoUtilizadorController extends Controller
{
    public function index()
    {
        $tiposUtilizador = TipoUtilizador::all();
        return view('parametrizacoes.tipo_utilizador.index', compact('tiposUtilizador'));
    }

    public function list(Request $request)
    {
        $query = TipoUtilizador::query();
        $total = $query->count();

        if ($request->has('estado')) {
            $estado = $request->input('estado');
            $query->where('estado', $estado);

            $total = $query->count();
        }

        if ($request->has('descricao')) {
            $descricao = $request->input('descricao');
            $query->where('descricao', 'like', '%' . $descricao . '%');

            $total = $query->count();
        }

        if ($request->has('nome')) {
            $nome = $request->input('nome');
            $query->where('nome', 'like', '%' . $nome . '%');

            $total = $query->count();
        }

        // Define o número de itens por página (você pode ajustar conforme necessário)
        $itensPorPagina = $request->input('limite', 10); // Padrão: 10 itens por página

        // Paginação dos dados retornados
        $tipo_utilizador = $query->paginate($itensPorPagina);

        // Adiciona parâmetros de filtro à URL da páginação
        $tipo_utilizador->appends($request->query());

        return view('parametrizacoes.tipo_utilizador.tabela', compact('tipo_utilizador', 'total'));
    }


    public function add(Request $request)
    {

        try {

            $json['success'] = null;
            $json['code'] = null;
            $json['message'] = null;

            $validatedData = $request->validate([
                'nome' => 'required|string|max:255',
                'role' => 'required|string|max:255',
                'pode_visualizar' => 'boolean',
                'pode_criar' => 'boolean',
                'pode_editar' => 'boolean',
                'pode_apagar' => 'boolean',
                'descricao' => 'nullable|string',
            ]);

            $tipo_utilizador = TipoUtilizador::create($validatedData);

            if ($tipo_utilizador) {
                $json['success'] = true;
                $json['message'] = 'Tipo de utilizador criado com sucesso.';
                $json['code'] = 200;
            } else {
                $json['success'] = false;
                $json['message'] = 'Erro ao adicionar o tipo de utilizador ' . $tipo_utilizador->nome;
                $json['code'] = 500;
            }
        } catch (\Illuminate\Validation\ValidationException $e) {

            $errors = $e->validator->errors()->all();

            $json['success'] = false;
            $json['message'] = $errors;
            $json['code'] = 422; // HTTP 422 Unprocessable Entity
        }

        echo json_encode($json);
    }

    public function show($id)
    {
        $tipoUtilizador = TipoUtilizador::find($id);
        return view('parametrizacoes.tipo_utilizador.form_update', compact('tipoUtilizador'));
    }

    public function show_details($id)
    {

        $tipo_utilizador = TipoUtilizador::find($id);


        $historico = Historico::where('row_id', $id)
            ->where('tabela', 'tipo_utilizadores')->with('users')->paginate(3);



        if (!$tipo_utilizador) {
            return response()->json(['error' => 'Tipo utilizador não encontrado'], 404);
        }

        return response()->view('parametrizacoes.tipo_utilizador.detalhes', compact('tipo_utilizador', 'historico'));
    }

    public function edit(Request $request)
    {

        $id = $request->id;
        $json['success'] = false;
        $json['message'] = null;
        $json['code'] = null;

        $tipo_utilizador = TipoUtilizador::find($id);
        $historico = new Historico();

        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'role' => [
                'required',
                'string',
                'max:255'
            ],
            'pode_visualizar' => 'boolean',
            'pode_criar' => 'boolean',
            'pode_editar' => 'boolean',
            'pode_apagar' => 'boolean',
            'descricao' => 'nullable|string',
        ]);

        


        try {

            if ($tipo_utilizador->update($data)) {
                $json['success'] = true;
                $json['message'] = 'Tipo de Utilizador ' . (string)$tipo_utilizador->name . ' actualizado com sucesso.';
                $json['code'] = 201;

                $descricao = "Actualizou o tipo de utilizador " . (string)$tipo_utilizador->name . "";
                $historico->insert($tipo_utilizador->getTable(), $tipo_utilizador->id, $descricao);
            } else {
                $json['success'] = false;
                $json['message'] = 'Ocorreu um erro ao editar o tipo de utilizador.';
                $json['code'] = 500;
            }
        } catch (\Illuminate\Validation\ValidationException $e) {

            $errors = $e->validator->errors()->all();

            $json['success'] = false;
            $json['message'] = $errors;
            $json['code'] = 422; // HTTP 422 Unprocessable Entity
        }

        echo json_encode($json);
    }


    public function delete()
    {
        $id = $_POST['tipo_utilizador_id'];
        $estado = $_POST['estado'];
        $json['success'] = false;
        $tipo_utilizador = TipoUtilizador::find($id);
        $historico = new Historico();

        if (!empty($tipo_utilizador)) {
            $data = ['estado' => $estado];
            if ($tipo_utilizador->update($data)) {
                $json['success'] = true;
                if ($estado == 1) {
                    $json['message'] = 'Tipo utilizador activado com sucesso.';

                    $descricao = 'Activou o Tipo utilizador ' . $tipo_utilizador->name . '.';
                    $historico->insert($tipo_utilizador->getTable(), $tipo_utilizador->id, $descricao);
                } else if ($estado == 2) {
                    $json['message'] = 'Tipo utilizador removido com sucesso.';

                    $descricao = 'Removeu o tipo utilizador ' . $tipo_utilizador->name . '.';
                    $historico->insert($tipo_utilizador->getTable(), $tipo_utilizador->id, $descricao);
                }
                $json['code'] = 200;
            } else {
                $json['success'] = false;
                $json['message'] = 'Ocorreu um erro ao remover o tipo utilizador.';
                $json['code'] = 500;
            }
        }
        echo json_encode($json);
    }
}
