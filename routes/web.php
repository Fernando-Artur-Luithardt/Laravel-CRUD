<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstoqueController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\HistoricoController;
use App\Http\Controllers\GerenciaController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/estoque', [EstoqueController::class, 'estoque'] )->middleware(['auth', 'verified'])->name('estoque');


Route::get('/estoque/produto/{produto?}', [ProdutoController::class, 'produto'] )->middleware(['auth', 'verified'])->name('produto');
Route::post('/estoque/produto/save', [ProdutoController::class, 'addProduto'] )->middleware(['auth', 'verified'])->name('produto.addProduto');

Route::get('/estoque/gerencia', [GerenciaController::class, 'gerencia'] )->middleware(['auth', 'verified'])->name('gerencia');
Route::post('/estoque/gerencia/save', [GerenciaController::class, 'addGerencia'] )->middleware(['auth', 'verified'])->name('gerencia.addGerencia');

Route::get('/estoque/historico', [HistoricoController::class, 'historico'] )->middleware(['auth', 'verified'])->name('historico');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
