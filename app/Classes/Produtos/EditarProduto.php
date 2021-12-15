<?php
namespace App\Classes\Produtos;
use App\praodutos_trabalho;
class EditarProduto
{
    function AtualizarDados($data)
    {
        $produto = praodutos_trabalho::find($data['produto_id']);
        return $produto->update(
            [
                "descricao" => $data['descricao'],
                "preco" => $data['preco'],
            ]
        );
    }
}
