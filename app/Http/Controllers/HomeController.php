<?php

namespace App\Http\Controllers;

use App\Classes\Categorias\CadastroDeProduto;
use App\Classes\Produtos\FacadesProduto;
use App\praodutos_trabalho;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use Illuminate\Support\Facades\DB;

use function GuzzleHttp\Promise\all;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // echo'Aqio';
        $facadesProduto = new FacadesProduto();
        $dados['titulo'] = 'pagina ingial';
        $dados['produtos'] = $facadesProduto->PegarTodosOsProdutos();
        return view('inicio', $dados);
    }

    public function GerenciarPodutos(){
        $dados['titulo'] = 'Inicio Teccomseg';
        return view('GerenciarProdutos', $dados);
    }





}
