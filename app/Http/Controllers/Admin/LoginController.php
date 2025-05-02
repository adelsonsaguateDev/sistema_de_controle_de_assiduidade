<?php

namespace App\Http\Controllers\Admin;

@session_start();
date_default_timezone_set('Africa/Maputo');

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\TipoUtilizador;


class LoginController extends Controller
{

    public function autenticar(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string'
        ]);

        // Tenta autenticar
        if (Auth::attempt(['username' => $credentials['username'], 'password' => $credentials['password'], 'estado' => 1])) {
            $request->session()->regenerate();

            $user = User::with('tipoUtilizador')->find(Auth::id());

            // Guardar permissões na sessão
            session([
                'nome_utilizador' => (string)$user->nome." ".$user->apelido,
                'tipo_utilizador' => $user->tipoUtilizador->nome,
                'email_utilizador' => $user->email,
                'permissoes' => [
                    'pode_visualizar' => $user->tipoUtilizador->pode_visualizar,
                    'pode_criar' => $user->tipoUtilizador->pode_criar,
                    'pode_editar' => $user->tipoUtilizador->pode_editar,
                    'pode_apagar' => $user->tipoUtilizador->pode_apagar,
                ]
            ]);

            return redirect()->intended('/home')->with('status', 'Login efectuado com sucesso.');
        } else {

            session_unset();
            return redirect()->back()->withErrors(['username' => 'Por favor verifique o seu nome de utilizador.', 'password' => 'Por favor verifique a sua senha.']);
        }
    }

    public function logout()
    {

        session_unset();
        session_destroy();
        return view('auth.login');
    }
}
