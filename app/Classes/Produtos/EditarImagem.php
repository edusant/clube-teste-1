<?php
namespace App\Classes\Produtos;

use Illuminate\Support\Facades\Storage;

class EditarImagem
{
    function AtualizarDados($img, $id_imagem)
    {
        try {
            //code...
            $fac = new FacadesProduto();
            $imagem = $fac->PegarImagemPorId($id_imagem);
            Storage::delete($imagem->caminho);
            $novocaminho =  Storage::putFile('products', $img);
            $up = new AtualizarCaminhoImagemBancoDeDados();
            return $up->AtualizarDados($id_imagem, $novocaminho);

        } catch (\Throwable $th) {
            //throw $th;
            return false;
        }

    }
}
