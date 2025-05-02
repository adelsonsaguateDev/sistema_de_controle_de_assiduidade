<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\UtilizadorController;
use App\Http\Controllers\TipoUtilizadorController;
use App\Http\Controllers\DashboardController;


Route::get('/', [LoginController::class, 'logout'])->name('login');
Route::get('/home',  [DashboardController::class, 'index'])->name('pagina_inicial');
Route::post('/autenticar', [LoginController::class, 'autenticar'])->name('autenticar');



Route::prefix('utilizadores')->name('utilizadores.')->group(function () {
    Route::get('/', [UtilizadorController::class, 'index'])->name('index');
    Route::post('/add', [UtilizadorController::class, 'add'])->name('add');
    Route::get('/list', [UtilizadorController::class, 'list'])->name('list');
    Route::post('/delete', [UtilizadorController::class, 'delete'])->name('delete');
    Route::get('/details/{id}', [UtilizadorController::class, 'show_details'])->name('detalhes');
    Route::get('/show/{id}', [UtilizadorController::class, 'show'])->name('show');
    Route::post('/edit', [UtilizadorController::class, 'edit'])->name('edit');

});

Route::prefix('tipo_utilizador')->name('tipo_utilizador.')->group(function () {
    Route::get('/', [TipoUtilizadorController::class, 'index'])->name('index');
    Route::post('/add', [TipoUtilizadorController::class, 'add'])->name('add');
    Route::get('/list', [TipoUtilizadorController::class, 'list'])->name('list');
    Route::post('/delete', [TipoUtilizadorController::class, 'delete'])->name('delete');
    Route::get('/details/{id}', [TipoUtilizadorController::class, 'show_details'])->name('detalhes');
    Route::get('/show/{id}', [TipoUtilizadorController::class, 'show'])->name('show');
    Route::post('/edit', [TipoUtilizadorController::class, 'edit'])->name('edit');

});
