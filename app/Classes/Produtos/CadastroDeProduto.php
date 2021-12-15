<?php
namespace App\Classes\Produtos;

use App\praodutos_trabalho;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class CadastroDeProduto
{
    public function Cadastro($data){
        $data['user_id'] = Auth::user()->id;
        return praodutos_trabalho::create($data);
    }
}
