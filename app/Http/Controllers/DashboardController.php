<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

date_default_timezone_set('Africa/Maputo');
setlocale(LC_ALL, 'pt', 'pt.utf-8', 'pt.utf-8', 'portuguese');

class DashboardController extends Controller
{


    public function index()
    {

        $total_utilizadores = User::count();
        $total_utilizadores_activos = User::where('estado', '=',1)->count();
        $total_utilizadores_inactivos = User::where('estado', '=',2)->count();

        return view('home', compact('total_utilizadores', 'total_utilizadores_activos', 'total_utilizadores_inactivos'));
    }


    public function index1()
    {
        return view('relatorios.index');
    }



    public function getGraficoBarras()
{
        $dados = DB::table('requisicoes')
            ->select(
                DB::raw('MONTH(created_at) as mes'),
                DB::raw('SUM(CASE WHEN estado_requisicao = 3 THEN 1 ELSE 0 END) as total_reprovadas'),
                DB::raw('SUM(CASE WHEN estado_requisicao = 2 THEN 1 ELSE 0 END) as total_aprovadas'),
                DB::raw('SUM(CASE WHEN estado_requisicao = 1 THEN 1 ELSE 0 END) as total_pendentes')
            )
            ->groupBy('mes')
            ->get();

        return response()->json($dados);
    }


    public function getGraficoPizza()
{
    $dados = DB::table('requisicoes')
                        ->whereIn('estado_requisicao', [1, 2, 3])
                        ->selectRaw("
                            CASE 
                                WHEN estado_requisicao = 1 THEN 'Pendente'
                                WHEN estado_requisicao = 2 THEN 'Aprovado'
                                WHEN estado_requisicao = 3 THEN 'Reprovado'
                            END as estado_requisicao_nome,
                            COUNT(*) as total
                        ")
    ->groupBy('estado_requisicao_nome')
    ->get();



        return response()->json($dados);
    }


}
