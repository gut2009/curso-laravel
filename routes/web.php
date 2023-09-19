<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AutorController;
use App\Http\Controllers\AssuntoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EditoraController;
use App\Http\Controllers\EmprestimoController;
use App\Http\Controllers\EspiritoController;
use App\Http\Controllers\LeitorController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\LocalController;
use App\Http\Controllers\TipoController;
use App\Http\Controllers\UsuarioController;

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
    return view('bemvindo');
});

Route::prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
});

Route::get('/teste', function() {
    return storage_path();
});

Route::prefix('autores')->group(function () {
    Route::get('/', [AutorController::class, 'index'])->name('autor.index');
    Route::get('/cadastrarAutor', [AutorController::class, 'store'])->name('cadastrar2.autor');
    Route::post('/cadastrarAutor', [AutorController::class, 'store'])->name('autor.store');
    Route::get('/atualizarAutor/{id}', [AutorController::class, 'update'])->name('atualizar.autor');
    Route::put('/atualizarAutor/{id}', [AutorController::class, 'update'])->name('autor.update');
    Route::get('/visualizarAutor/{id}', [AutorController::class, 'show'])->name('autor.show');
    Route::get('/excluirAutor/{id}', [AutorController::class, 'destroy'])->name('autor.destroy');
    Route::delete('/excluirAutor/{id}', [AutorController::class, 'destroy'])->name('autor.delete');
});

Route::prefix('assuntos')->group(function () {
    Route::get('/', [AssuntoController::class, 'index'])->name('assunto.index');
    Route::get('/cadastrarAssunto', [AssuntoController::class, 'store'])->name('cadastrar2.assunto');
    Route::post('/cadastrarAssunto', [AssuntoController::class, 'store'])->name('assunto.store');
    Route::get('/atualizarAssunto/{id}', [AssuntoController::class, 'update'])->name('atualizar.assunto');
    Route::put('/atualizarAssunto/{id}', [AssuntoController::class, 'update'])->name('assunto.update');
    Route::get('/visualizarAssunto/{id}', [AssuntoController::class, 'show'])->name('assunto.show');
    Route::get('/excluirAssunto/{id}', [AssuntoController::class, 'destroy'])->name('assunto.destroy');
    Route::delete('/excluirAssunto/{id}', [AssuntoController::class, 'destroy'])->name('assunto.delete');
});

Route::prefix('categorias')->group(function () {
    Route::get('/', [CategoriaController::class, 'index'])->name('categoria.index');
    Route::get('/cadastrarCategoria', [CategoriaController::class, 'store'])->name('cadastrar2.categoria');
    Route::post('/cadastrarCategoria', [CategoriaController::class, 'store'])->name('categoria.store');
    Route::get('/atualizarCategoria/{id}', [CategoriaController::class, 'update'])->name('atualizar.categoria');
    Route::put('/atualizarCategoria/{id}', [CategoriaController::class, 'update'])->name('categoria.update');
    Route::get('/visualizarCategoria/{id}', [CategoriaController::class, 'show'])->name('categoria.show');
    Route::get('/excluirCategoria/{id}', [CategoriaController::class, 'destroy'])->name('categoria.destroy');
    Route::delete('/excluirCategoria/{id}', [CategoriaController::class, 'destroy'])->name('categoria.delete');
});


Route::prefix('contatos')->group(function () {
    Route::get('/', [ContatoController::class, 'index'])->name('contato.index');
    Route::get('/cadastrarContato', [ContatoController::class, 'store'])->name('cadastrar2.contato');
    Route::post('/cadastrarContato', [ContatoController::class, 'store'])->name('contato.store');
    Route::get('/atualizarContato/{id}', [ContatoController::class, 'update'])->name('atualizar.contato');
    Route::put('/atualizarContato/{id}', [ContatoController::class, 'update'])->name('contato.update');
    Route::get('/atualizarContato/{id}', [ContatoController::class, 'edit'])->name('contato.edit');
    Route::get('/visualizarContato/{id}', [ContatoController::class, 'show'])->name('contato.show');
    Route::get('/excluirContato/{id}', [ContatoController::class, 'destroy'])->name('contato.destroy');
    Route::delete('/excluirContato/{id}', [ContatoController::class, 'destroy'])->name('contato.delete');
});

Route::prefix('editoras')->group(function () {
    Route::get('/', [EditoraController::class, 'index'])->name('editora.index');
    Route::get('/cadastrarEditora', [EditoraController::class, 'store'])->name('cadastrar2.editora');
    Route::post('/cadastrarEditora', [EditoraController::class, 'store'])->name('editora.store');
    Route::get('/atualizarEditora/{id}', [EditoraController::class, 'update'])->name('atualizar2.editora');
    Route::patch('/atualizarEditora/{id}', [EditoraController::class, 'update'])->name('editora.update');
    Route::get('/atualizarEditora/{id}', [EditoraController::class, 'edit'])->name('editora.edit');
    Route::get('/visualizarEditora/{id}', [EditoraController::class, 'show'])->name('editora.show');
    Route::get('/excluirEditora/{id}', [EditoraController::class, 'destroy'])->name('editora.destroy');
    Route::delete('/excluirEditora/{id}', [EditoraController::class, 'destroy'])->name('editora.delete');
});


Route::prefix('emprestimos')->group(function () {
    Route::get('/', [EmprestimoController::class, 'index'])->name('emprestimo.index');
    Route::get('/cadastrarEmprestimo', [EmprestimoController::class, 'store'])->name('cadastrar2.emprestimo');
    Route::post('/cadastrarEmprestimo', [EmprestimoController::class, 'store'])->name('emprestimo.store');
    Route::get('/atualizarEmprestimo/{id}', [EmprestimoController::class, 'update'])->name('atualizar2.emprestimo');
    Route::put('/atualizarEmprestimo/{id}', [EmprestimoController::class, 'update'])->name('emprestimo.update');
    Route::get('/atualizarEmprestimo/{id}', [EmprestimoController::class, 'edit'])->name('emprestimo.edit');
    Route::get('/visualizarEmprestimo/{id}', [EmprestimoController::class, 'show'])->name('emprestimo.show');
    Route::get('/excluirEmprestimo/{id}', [EmprestimoController::class, 'destroy'])->name('emprestimo.destroy');
    Route::delete('excluirEmprestimo/{id}', [EmprestimoController::class, 'destroy'])->name('emprestimo.delete');
});


Route::prefix('espiritos')->group(function () {
    Route::get('/', [EspiritoController::class, 'index'])->name('espirito.index');
    Route::get('/cadastrarEspirito', [EspiritoController::class, 'store'])->name('cadastrar2.espirito');
    Route::post('/cadastrarEspirito', [EspiritoController::class, 'store'])->name('espirito.store');
    Route::get('/atualizarEspirito/{id}', [EspiritoController::class, 'update'])->name('atualizar2.espirito');
    Route::put('/atualizarEspirito/{id}', [EspiritoController::class, 'update'])->name('espirito.update');
    Route::get('/visualizarEspirito/{id}', [EspiritoController::class, 'show'])->name('espirito.show');
    Route::get('/deleteEspirito/{id}', [EspiritoController::class, 'destroy'])->name('espirito.destroy');
    Route::delete('/deleteEspirito/{id}', [EspiritoController::class, 'destroy'])->name('espirito.delete');
});

Route::prefix('leitores')->group(function () {
    Route::get('/', [LeitorController::class, 'index'])->name('leitor.index');
    Route::get('/cadastrarLeitor', [LeitorController::class, 'store'])->name('cadastrar2.leitor');
    Route::post('/cadastrarLeitor', [LeitorController::class, 'store'])->name('leitor.store');
    Route::get('/atualizarLeitor/{id}', [LeitorController::class, 'update'])->name('atualizar2.leitor');
    Route::patch('/atualizarLeitor/{id}', [LeitorController::class, 'update'])->name('leitor.update');
    Route::get('/atualizarLeitor/{id}', [LeitorController::class, 'edit'])->name('leitor.edit');
    Route::get('/visualizarLeitor/{id}', [LeitorController::class, 'show'])->name('leitor.show');
    Route::get('/excluirLeitor/{id}', [LeitorController::class, 'destroy'])->name('leitor.destroy');
    Route::delete('/excluirLeitor/{id}', [LeitorController::class, 'destroy'])->name('leitor.delete');
});

Route::prefix('livros')->group(function () {
    Route::get('/', [LivroController::class, 'index'])->name('livro.index');
    Route::get('/cadastrarLivro', [LivroController::class, 'store'])->name('cadastrar2.livro');
    Route::post('/cadastrarLivro', [LivroController::class, 'store'])->name('livro.store');
    Route::get('/atualizarLivro/{id}', [LivroController::class, 'update'])->name('atualizar.livro');
    Route::patch('/atualizarLivro/{id}', [LivroController::class, 'update'])->name('livro.update');
    Route::get('/atualizarLivro/{id}', [LivroController::class, 'edit'])->name('livro.edit');
    Route::get('/visualizarLivro/{id}', [LivroController::class, 'show'])->name('livro.show');
    Route::get('/excluirLivro/{id}', [LivroController::class, 'destroy'])->name('livro.destroy');
    Route::delete('/excluirLivro/{id}', [LivroController::class, 'destroy'])->name('livro.delete');
});

Route::prefix('locais')->group(function () {
    Route::get('/', [LocalController::class, 'index'])->name('local.index');
    Route::get('/cadastrarLocal', [LocalController::class, 'store'])->name('cadastrar2.local');
    Route::post('/cadastrarLocal', [LocalController::class, 'store'])->name('local.store');
    Route::get('/atualizarLocal/{id}', [LocalController::class, 'update'])->name('atualizar.local');
    Route::put('/atualizarLocal/{id}', [LocalController::class, 'update'])->name('local.update');
    Route::get('/visualizarLocal/{id}', [LocalController::class, 'show'])->name('local.show');
    Route::get('/excluirLocal/{id}', [LocalController::class, 'destroy'])->name('local.destroy');
    Route::delete('/excluirLocal/{id}', [LocalController::class, 'destroy'])->name('local.delete');
});

Route::prefix('tipos')->group(function () {
    Route::get('/', [TipoController::class, 'index'])->name('tipo.index');
    Route::get('/cadastrarTipo', [TipoController::class, 'store'])->name('cadastrar2.tipo');
    Route::post('/cadastrarTipo', [TipoController::class, 'store'])->name('tipo..store');
    Route::get('/atualizarTipo/{id}', [TipoController::class, 'update'])->name('atualizar2.tipo');
    Route::put('/atualizarTipo/{id}', [TipoController::class, 'update'])->name('tipo.update');
    Route::get('/visualizarTipo/{id}', [TipoController::class, 'show'])->name('tipo.show');
    Route::get('/excluirTipo/{id}', [TipoController::class, 'destroy'])->name('tipo.destroy');
    Route::delete('/excluirTipo/{id}', [TipoController::class, 'destroy'])->name('tipo.delete');
});

Route::prefix('usuario')->group(function () {
    Route::get('/', [UsuarioController::class, 'index'])->name('usuario.index');
    Route::get('/cadastrarUsuario', [UsuarioController::class, 'store'])->name('cadastrar2.usuario');
    Route::post('/cadastrarUsuario', [UsuarioController::class, 'store'])->name('usuario.store');
    Route::get('/atualizarUsuario/{id}', [UsuarioController::class, 'update'])->name('atualizar2.usuario');
    Route::patch('/atualizarUsuario/{id}', [UsuarioController::class, 'update'])->name('usuario.update');
    Route::get('/atualizarUsuario/{id}', [UsuarioController::class, 'edit'])->name('usuario.edit');
    Route::get('/visualizarUsuario/{id}', [UsuarioController::class, 'show'])->name('usuario.show');
    Route::get('/excluirUsuario/{id}', [UsuarioController::class, 'destroy'])->name('usuario.destroy');
    Route::delete('/excluirUsuario/{id}', [UsuarioController::class, 'destroy'])->name('usuario.delete');
});


// Route::get('/enviaComprovantePorEmail/{id}', [VendasController::class, 'enviaComprovantePorEmail'])->name('enviaComprovantePorEmail.venda');