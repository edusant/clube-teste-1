<?php
namespace App\Classes\Produtos;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CadastrarImagem
{
    public function Cadastro($data, $produto_id){
            $foto = $data['imgpro'];

                if ($foto->isValid()) {
                    $imgcaminho =  Storage::putFile('products', $data->file('imgpro'));
                return  DB::table('produtos_imagens')->insert([
                        'produto_id' => $produto_id,
                        'caminho' => $imgcaminho
                        ]
                    );
                }
    }
}
