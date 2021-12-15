<?php
namespace App\Classes\Produtos;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AtualizarCaminhoImagemBancoDeDados
{
    function AtualizarDados($img_id, $novocaminho)
    {

        return  DB::table('produtos_imagens')->where('id', '=', $img_id)->update([
            'caminho' => $novocaminho
            ]
        )
        ;
    }
}
