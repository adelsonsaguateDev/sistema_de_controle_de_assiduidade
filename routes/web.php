<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\UtilizadorController;
use App\Http\Controllers\TipoUtilizadorController;
use App\Http\Controllers\DashboardController;


Route::get('/', [LoginController::class, 'logout'])->name('login');
//Pagina inicial
Route::get('/home',  [DashboardController::class, 'index'])->name('pagina_inicial');
//Login & Logout
Route::post('/autenticar', [LoginController::class, 'autenticar'])->name('autenticar');



Route::get('/', function () {
    return view('auth.login');
});
