<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MembroController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/membros', [MembroController::class, 'index']);
Route::post('/membros', [MembroController::class, 'store'])->name('membros.store');
Route::get('/membros/{id}', [MembroController::class, 'show'])->name('membros.show');
Route::get('/', [MembroController::class, 'create'])->name('membros.create');
