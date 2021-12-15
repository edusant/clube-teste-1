<?php
namespace App\Classes\Produtos;

use App\Classes\inferfaces\atualizar;
use App\praodutos_trabalho;
class ArquivarProduto implements atualizar
{
    function AtualizarDados($data)
    {
        $produto = praodutos_trabalho::find($data['produto_id']);
        return $produto->update(
            [
                "status" => false
            ]
        );
    }
}
