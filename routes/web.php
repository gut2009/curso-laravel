<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\VendasController;
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
    return view('index');
});

Route::prefix('produtos')->group(function () {
    Route::get('/', [ProdutosController::class, 'index'])->name('produto.index');
    // Cadastrar --> Create
    Route::get('/cadastrarProduto', [ProdutosController::class, 'cadastrarProduto'])->name('cadastrar.produto');
    Route::post('/cadastrarProduto', [ProdutosController::class, 'cadastrarProduto'])->name('cadastrar.produto');
    // Atualizar --> Update
    Route::get('/atualizarProduto/{id}', [ProdutosController::class, 'atualizarProduto'])->name('atualizar.produto');
    Route::put('/atualizarProduto/{id}', [ProdutosController::class, 'atualizarProduto'])->name('atualizar.produto');
     // Visualizar --> Show
    Route::get('/visualizarProduto/{id}', [ProdutosController::class, 'visualizarProduto'])->name('visualizar.produto');
    // Excluir --> Destroy
    Route::delete('/delete', [ProdutosController::class, 'delete'])->name('produto.delete');
});

Route::prefix('clientes')->group(function () {
    Route::get('/', [ClientesController::class, 'index'])->name('cliente.index');
    // Cadastrar --> Create
    Route::get('/cadastrarCliente', [ClientesController::class, 'cadastrarCliente'])->name('cadastrar.cliente');
    Route::post('/cadastrarCliente', [ClientesController::class, 'cadastrarCliente'])->name('cadastrar.cliente');
    // Atualizar --> Update
    Route::get('/atualizarCliente/{id}', [ClientesController::class, 'atualizarCliente'])->name('atualizar.cliente');
    Route::put('/atualizarCliente/{id}', [ClientesController::class, 'atualizarCliente'])->name('atualizar.cliente');
    // Visualizar --> Show
    Route::get('/visualizarCliente/{id}', [ClientesController::class, 'visualizarCliente'])->name('visualizar.cliente');
    // Excluir --> Destroy
    Route::delete('/delete', [ClientesController::class, 'delete'])->name('cliente.delete');
});

Route::prefix('vendas')->group(function () {
    Route::get('/', [VendasController::class, 'index'])->name('venda.index');
    // Cadastrar --> Create
    Route::get('/cadastrarVenda', [VendasController::class, 'cadastrarVenda'])->name('cadastrar.venda');
    Route::post('/cadastrarVenda', [VendasController::class, 'cadastrarVenda'])->name('cadastrar.venda');
    // Atualizar --> Update
    Route::get('/atualizarVenda/{id}', [VendasController::class, 'atualizarVenda'])->name('atualizar.venda');
    Route::put('/atualizarVenda/{id}', [VendasController::class, 'atualizarVenda'])->name('atualizar.venda');
    // Visualizar --> Show
    Route::get('/visualizarVenda/{id}', [VendasController::class, 'visualizarVenda'])->name('visualizar.venda');
});