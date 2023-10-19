<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PontoColetaController;
use App\Http\Controllers\DoacaoController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Pontos de Coleta
Route::get('/pontos-coleta', [PontoColetaController::class, 'pontos_coleta'])->name('pontos.coleta');
Route::get('/adicionar-ponto-coleta', [PontoColetaController::class, 'adicionar_ponto_coleta'])->name('adicionar.ponto.coleta');
Route::post('/salvar-ponto-coleta',[PontoColetaController::class,'salvar_ponto_coleta'])->name('salvar.ponto.coleta');
Route::get('/editar-ponto-coleta/{id}',[PontoColetaController::class,'editar_ponto_coleta'])->name('editar.ponto.coleta');
Route::post('/atualizar-ponto-coleta/{id}',[PontoColetaController::class,'atualizar_ponto_coleta'])->name('atualizar.ponto.coleta');
Route::get('/deletar-ponto-coleta/{id}',[PontoColetaController::class,'deletar_ponto_coleta'])->name('deletar.ponto.coleta');


//Doações
Route::get('/todas-doacoes', [DoacaoController::class, 'todas_doacoes'])->name('todas.doacoes');
Route::get('/adicionar-doacao', [DoacaoController::class, 'adicionar_doacao'])->name('adicionar.doacao');
Route::post('/salvar-doacao',[DoacaoController::class,'salvar_doacao'])->name('salvar.doacao');
Route::get('/editar-doacao/{id}',[DoacaoController::class,'editar_doacao'])->name('editar.doacao');
Route::post('/atualizar-doacao/{id}',[DoacaoController::class,'atualizar_doacao'])->name('atualizar.ponto.doacao');
Route::get('/deletar-doacao/{id}',[DoacaoController::class,'deletar_doacao'])->name('deletar.doacao');

require __DIR__.'/auth.php';
