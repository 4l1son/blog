<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MembroController;

    Route::get('/', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.auth');

Route::get('/listalogins', [LoginController::class, 'showlogins'])->name('login.listaLogin');
Route::get('/cadastro-logins', [LoginController::class, 'cadastrologins'])->name('login.cadastroLogin');
Route::post('/cadastro-logins', [LoginController::class, 'createLogin'])->name('login.cadastroLogin');

Route::get('/membros', [MembroController::class, 'index']);
Route::post('/membros', [MembroController::class, 'store'])->name('membros.store');
Route::get('/membros/{id}', [MembroController::class, 'show'])->name('membros.show');
Route::get('/ListaMembros', [MembroController::class, 'showMembers'])->name('membros.get');

Route::get('/pagina', [MembroController::class, 'create'])->name('membros.create');
Route::post('/filtro', [MembroController::class, 'filtro'])->name('membros.filtro');
Route::get('/lista', [MembroController::class, 'getFiltro'])->name('membros.lista');
