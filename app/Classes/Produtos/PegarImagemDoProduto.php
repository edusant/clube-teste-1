<?php
namespace App\Classes\Produtos;
use Illuminate\Support\Facades\DB;
class PegarImagemDoProduto
{
    public function GetData($idProduto){
        return DB::table('produtos_imagens')->where('produto_id', '=', $idProduto)->first();
    }
}
