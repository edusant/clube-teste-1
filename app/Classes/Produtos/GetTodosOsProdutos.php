<?php
namespace App\Classes\Produtos;
use App\praodutos_trabalho;
class GetTodosOsProdutos
{
    public function GetData(){
        return praodutos_trabalho::paginate(8);
    }
}
