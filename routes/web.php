<?php

use App\Http\Controllers\Produtos_ImagensController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::prefix('usuarios')->group(function(){
    Route::get('/inserir',[UsuariosController::class, 'create'])->name('usuarios.inserir');
    Route::post('/inserir',[UsuariosController::class, 'insert'])->name('usuarios.gravar');
});

Route::get('/login',[UsuariosController::class,'login'])->name('login');
Route::post('/login',[UsuariosController::class,'login']);
Route::get('/logout', [UsuariosController::class, 'logout'])->name('logout');



Route::get('/produtos/inserir', [ProdutosController::class, 'create'])->name('produtos.inserir');
Route::post('/produtos/inserir', [ProdutosController::class, 'insert'])->name('produtos.gravar');
Route::get('/produtos/meusProdutos',[ProdutosController::class, 'meusProdutos'])->name('produtos.meusProdutos');

Route::get('/produtos/calcados',[ProdutosController::class, 'calcados'])->name('calcados');
Route::get('/produtos/inverno',[ProdutosController::class, 'inverno'])->name('inverno');
Route::get('/produtos/verao',[ProdutosController::class, 'verao'])->name('verao');
Route::get('/produtos/diversos',[ProdutosController::class, 'diversos'])->name('diversos');