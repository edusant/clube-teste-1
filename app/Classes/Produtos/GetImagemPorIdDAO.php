<?php
namespace App\Classes\Produtos;
use Illuminate\Support\Facades\DB;
class GetImagemPorIdDAO
{
    public function GetData($idimagem){
        return DB::table('produtos_imagens')->where('id', '=', $idimagem)->first();
    }
}
