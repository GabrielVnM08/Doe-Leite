<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/ponto/pontos-coleta', [PontoColetaController::class, 'pontos_coleta'])->name('pontos.coleta');
//Route::get('/ponto/adicionar-ponto-coleta', [PontoColetaController::class, 'adicionar_ponto_coleta'])->name('adicionar.ponto.coleta')
//Route::post('/salvar-ponto-coleta',[PontoColetaController::class,'salvar_ponto_coleta'])->name('salvar.ponto.coleta');
//Route::get('/ponto/editar-ponto-coleta/{id}',[PontoColetaController::class,'editar_ponto_coleta'])->name('editar.ponto.coleta');
//Route::post('/atualizar-ponto-coleta/{id}',[PontoColetaController::class,'atualizar_ponto_coleta'])->name('atualizar.ponto.coleta');
//Route::get('/ponto/deletar-ponto-coleta/{id}',[PontoColetaController::class,'deletar_ponto_coleta'])->name('deletar.ponto.coleta');

require __DIR__.'/auth.php';
