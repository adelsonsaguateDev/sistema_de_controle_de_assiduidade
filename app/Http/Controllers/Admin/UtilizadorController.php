<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\TipoUtilizador;
use App\Models\Historico;

date_default_timezone_set('Africa/Maputo');
setlocale(LC_ALL, 'pt', 'pt.utf-8', 'pt.utf-8', 'portuguese');

class UtilizadorController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $tipo_utilizador = TipoUtilizador::all();

        return view('pages.utilizador.index', compact('tipo_utilizador'));
    }

    public function list(Request $request)
    {

        $query = User::with(['TipoUtilizador']);


        $total = $query->count();

        if ($request->has('estado')) {
            $estado = $request->input('estado');
            $query->where('estado', $estado);

            $total = $query->count();
        }

        if ($request->has('nome')) {
            $nome = $request->input('nome');
            $query->where('nome', 'like', '%' . $nome . '%');

            $total = $query->count();
        }

        // Define o número de itens por página (você pode ajustar conforme necessário)
        $itensPorPagina = $request->input('limite', 10); // Padrão: 10 itens por página

        // Recupera os utilizadores paginados
        $utilizadores = $query->paginate($itensPorPagina);

        // Adiciona parâmetros de filtro à URL da páginação
        $utilizadores->appends($request->query());


        return view('pages.utilizador.tabela', compact('utilizadores', 'total'));
    }


    public function add(Request $request)
    {

        try {

            $json['success'] = null;
            $json['code'] = null;
            $json['message'] = null;

            $historico = new Historico();

            $data = $request->validate([
                'nome' => 'required',
                'apelido' => 'required',
                'username' => 'required|unique:users',
                'tipo_user' => 'required',
                'email' => 'required|email|unique:users',
                'contacto' => 'required|unique:users',
                'password' => 'min:6|required_with:password_confirmation|same:password_confirm',
                'password_confirm' => 'min:6',

            ]);

            $data['password'] = Hash::make($data['password']);
            $data['estado'] = 1;
            $utilizador = User::create($data);
            if ($utilizador) {

                $descricao = 'Registou o utilizador ' . (string)$utilizador->name . '.';
                $historico->insert($utilizador->getTable(), $utilizador->id, $descricao);

                $json['success'] = true;
                $json['message'] = 'O utilizador' . (string)$utilizador->name . ' foi adicionado com sucesso.';
                $json['code'] = 200;
            } else {
                $json['success'] = false;
                $json['message'] = 'Erro ao adicionar o utilizador ' . (string)$utilizador->name;
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


    public function show_details($id)
    {

        $utilizador = User::find($id);


        $historico = Historico::where('row_id', $id)
            ->where('tabela', 'users')->with('users')->paginate(3);

        if (!$utilizador) {
            return response()->json(['error' => 'Utilizador não encontrado'], 404);
        }

        return response()->view('pages.utilizador.detalhes', compact('utilizador', 'historico'));
    }

    public function delete()
    {
        $id = $_POST['utilizador_id'];
        $estado = $_POST['estado'];
        $json['success'] = false;
        $utilizador = User::find($id);
        $historico = new Historico();

        if (!empty($utilizador)) {
            $data = ['estado' => $estado];
            if ($utilizador->update($data)) {
                $json['success'] = true;
                if ($estado == 1) {
                    $json['message'] = 'Utilizador activado com sucesso.';

                    $descricao = 'Activou o Utilizador ' . $utilizador->name . '.';
                    $historico->insert($utilizador->getTable(), $utilizador->id, $descricao);
                } else if ($estado == 2) {
                    $json['message'] = 'Utilizador removido com sucesso.';

                    $descricao = 'Removeu o utilizador ' . $utilizador->name . '.';
                    $historico->insert($utilizador->getTable(), $utilizador->id, $descricao);
                }
                $json['code'] = 200;
            } else {
                $json['success'] = false;
                $json['message'] = 'Ocorreu um erro ao remover o utilizador.';
                $json['code'] = 500;
            }
        }
        echo json_encode($json);
    }

    public function show($id)
    {
        $utilizador = User::find($id);
        $tipo_utilizador = TipoUtilizador::all();
        return view('pages.utilizador.form_update', compact('utilizador', 'tipo_utilizador'));
    }



    public function edit(Request $request)
    {

        $id = $request->id;
        $json['success'] = false;
        $json['message'] = null;
        $json['code'] = null;
        $utilizador = User::find($id);
        $historico = new Historico();

        $data = request()->validate([
            'nome' => 'required',
            'apelido' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'contacto' => 'required',
            'tipo_user' => 'required',

        ]);

        try {

            if ($utilizador->update($data)) {
                $json['success'] = true;
                $json['message'] = 'Utilizador ' . (string)$utilizador->name . ' actualizado com sucesso.';
                $json['code'] = 201;

                $descricao = "Actualizou o utilizador " . (string)$utilizador->name . "";
                $historico->insert($utilizador->getTable(), $utilizador->id, $descricao);
            } else {
                $json['success'] = false;
                $json['message'] = 'Ocorreu um erro ao editar o utilizador.';
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
}
