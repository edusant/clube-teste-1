<?php
namespace App\Classes\Produtos;


class FacadesProduto
{
    public function cadastrandoProduto($request){
        $cadPro = new CadastroDeProduto();
        return $cadPro->Cadastro($request);
    }

    public function CadastarImagems($data, $produto_id){
        $cadImagem = new CadastrarImagem();
        return $cadImagem->Cadastro($data, $produto_id);
    }

    public function PegarTodosOsProdutos(){
        $data = new GetTodosOsProdutos();
        return $data->GetData();
    }

    public function pegarDadosUnicoProduto($produto_id){
        $getproduto = new GetDadosProduto();
        return $getproduto->GetData($produto_id);
    }

    public function PegarImagemDeProdutoFachada($produto_id){
        $getproduto = new PegarImagemDoProduto();
        return $getproduto->GetData($produto_id);
    }

    public function PegarImagemPorId($imagem_id){
        $get = new GetImagemPorIdDAO();
        return $get->GetData($imagem_id);
    }

    public function EditarProduto($data){
        $editarProduto = new EditarProduto();
        return $editarProduto->AtualizarDados($data);
    }

    public function NomeEditarProduto($data){
        $editarNome = new EditarNomeProduto();
        return $editarNome->AtualizarDados($data);
    }


    public function AtualizarImagem($img_fille, $img_id){
        $cadImagem = new EditarImagem();
        return $cadImagem->AtualizarDados($img_fille, $img_id);
    }
}
