<?php
namespace App\Http\Controllers;
use App\Classes\Produtos\FacadesProduto;
use Illuminate\Http\Request;

class produtos extends Controller
{
    //

    public function paginacadastrodeproduto(){
        $facadesProduto = new FacadesProduto();
        $data['titulo'] = 'Fazer cadastro';
        $data['produtos'] = $facadesProduto->PegarTodosOsProdutos();
        return view('Adm/PaginaAdicionarProdutos', $data);
    }

    public function SAlvandoProduto(Request $request){
        $datares = $request->all();
        // dd($datares);
        $request->validate([
          'imgpro' =>  'image|required',
           'nome' => 'required|min:3|unique:produtos,nome',
           'preco' => 'required|min:3',
           'descricao' => 'required|min:3',

        ]);
        $facadesProduto = new FacadesProduto();
        $data = $facadesProduto->cadastrandoProduto($datares);
        $datares['id'] = $data['id'];
        if($facadesProduto->CadastarImagems($request, $data['id'])){
            $request->session()->flash('status', 'Cadastro feito com sucesso!');
            return redirect()->route('adm.editar.produto', [$data['id']]);
        }
    }




    public function ApresentarPaginaEditarProduto(Request $request){
        // $request->validate([''])
        $facadesProduto = new FacadesProduto();
        $data['titulo'] = 'Fazer cadastro';
        $data['produto'] = $facadesProduto->pegarDadosUnicoProduto($request['produto_id']);
        $data['imagem'] = $facadesProduto->PegarImagemDeProdutoFachada($request['produto_id']);
        return view('Adm/PaginaEditarProduto', $data);
    }

    public function EditarProduto(Request $request){
        $request->validate([
             'preco' => 'required|min:3',
             'descricao' => 'required|min:3',
             'produto_id' => 'required|exists:produtos,id'

          ]);
        $facadesProduto = new FacadesProduto();
        if($facadesProduto->EditarProduto($request->all()))
        {
            $request->session()->flash('status', 'Produto editado com sucesso!');
            return back();
        }


    }

    public function EditarProdutoNome(Request $request)
    {

        $request->validate([
             'nome' => 'required|min:3|unique:produtos,nome',
          ]);
        $facadesProduto = new FacadesProduto();
        if($facadesProduto->NomeEditarProduto($request->all())){
            $request->session()->flash('status', 'nome editado com sucesso!');
            return back();
        }
    }

    public function ExibirOProduto(Request $request){
        $facadesProduto = new FacadesProduto();
        $data['titulo'] = 'Exibicao produto';
        $data['produto'] = $facadesProduto->pegarDadosUnicoProduto($request['id']);
        return view('exibicaoProduto', $data);
    }

    public function VerProduto(Request $request){
        $facadesProduto = new FacadesProduto();
        $data['titulo'] = 'Exibicao produto';
        $data['imagem'] = $facadesProduto->PegarImagemDeProdutoFachada($request['produto_id']);
        $data['produto'] = $facadesProduto->pegarDadosUnicoProduto($request['produto_id']);
        return view('exibicaoProduto', $data);
    }

    public function ExibirTodosOsProduto(){
        $facadesProduto = new FacadesProduto();
        $data['produtos'] = $facadesProduto->PegarTodosOsProdutos();
        return view('TodosOsProdutos', $data);
    }



    public function EditarImagemProduto(Request $request){

        $request->validate([
            'imgpro' =>  'image|required',

          ]);
        $facadesProduto = new FacadesProduto();
        if($facadesProduto->AtualizarImagem($request->all()['imgpro'], $request->all()['imagem_id'])){
            {
                $request->session()->flash('status', 'imagem editado com sucesso!');
                return back();
            }
        }
    }
}
