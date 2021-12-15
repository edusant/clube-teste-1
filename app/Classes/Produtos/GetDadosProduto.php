<?php
namespace App\Classes\Produtos;
use App\praodutos_trabalho;
class GetDadosProduto
{
    public function GetData($produto_id){
        return praodutos_trabalho::find($produto_id);
    }
}
