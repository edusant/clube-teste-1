<?php
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

Route::get('/Cadastro', function () {
    $data['titulo'] = 'Fazer cadastro';
    return view('Usuario/Inscrevase', $data);
});

Route::get('/','HomeController@index');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();



Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    $request->session()->flash('status', 'Link enviado com sucesso!');
    return back();
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');


Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');



Route::get('sair',function(){
    Auth::logout();
    return redirect('/');
});

// Auth::routes(['verify' => true]);

Route::post('Adm/Postando/Produto', 'produtos@SAlvandoProduto')->name('CadastrodeProduto')->middleware('auth');


Route::get('ver/produto/{produto_id}', 'produtos@VerProduto')->name('ver.produto');

Route::get('Adm/Editar/Produto/{produto_id}', 'produtos@ApresentarPaginaEditarProduto')->middleware('auth')->name('adm.editar.produto')->middleware('verified');

Route::post('Adm/Editar/Produto/', 'produtos@EditarProduto')->middleware('auth')->name('adm.editar.produto.post');

Route::post('Adm/Editar/Produto/nome/', 'produtos@EditarProdutoNome')->middleware('auth')->name('adm.editar.produto.post.nome');

Route::get('ADM/ADD/Produto', 'produtos@paginacadastrodeproduto')->name('adicionar.produto')->middleware('auth')->middleware('verified');


Route::post('adm/adicionar/categorias/produtos', 'categorias@AdicionarCategoriaEmProduto')->name('adm.so.adicionar.categorias')->middleware('auth');

Route::post('adm/Arquivar/produto', 'produtos@ArquivarProduto')->name('adm.arquivar.produto')->middleware('auth');


Route::get('Produto/{id}/{nome}', 'produtos@ExibirOProduto')->name('mostarProduto');

Route::get('produtos/todos', 'produtos@ExibirTodosOsProduto')->name('todososprodutos');


Route::post('editar/imagem/produto', 'produtos@EditarImagemProduto')->name('editar.imagem.produto')->middleware('auth');
