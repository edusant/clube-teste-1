<?php

namespace Tests\Feature;

use App\Classes\apresentacao\GetVideosMaisPopupinin;
use App\Classes\validador\ValidarVarExiste;
use App\Classes\videoslivres\AumentarContadoVideo;
use App\Classes\videoslivres\GetVideoParaexibicao;
use App\Classes\videoslivres\GetVideosDoProf;
use App\Classes\videoslivres\PegarPerguntasDovideo;
use App\Classes\videoslivres\ValidarAuthorDoVideo;
use App\Classes\videoslivres\ValidarProfessorDoVideo;
use App\Classes\videoslivres\VerificarVideoAtivoPeloADM;
use App\Models\videoslivre;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class videoTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testCometariosvideo()
    {
        $pegarperguntas =new PegarPerguntasDovideo();
        $perguntas = $pegarperguntas->PegarDados(6);
        foreach ($perguntas as $pergunta) {
            $this->assertEquals($pergunta->videoslivres_id, 6);
        }

    }


    public function testSaidavideosp(){
        $Getvi = new GetVideosDoProf();
        $id = '4';
        $dados = $Getvi->PegarDados($id);

        // dd($dados);
        // $id= '9';

        foreach ($dados as  $v) {
            $this->assertEquals($v->user_id, $id);
            $this->assertEquals($v->status, true);
        }
    }

    public function testPegardadosvideos(){
        $pegarVideo = new GetVideoParaexibicao();
        $id = 7;
        $dados['video'] = $pegarVideo->PegarDados($id);
        $this->assertEquals($id, $dados['video']->id);
    }

    public function testPara(){
        //Colacando um vídeo verdadeiro e ativo
        $pegarVideo = new GetVideoParaexibicao();
        $um = $pegarVideo->PegarDados(6);
        $dois = $pegarVideo->PegarDados(10000000);
        $tres = $pegarVideo->PegarDados(1);
        $validarExis = new ValidarVarExiste();
        $this->assertEquals($validarExis->RegraValidacao($um), true);
        $this->assertEquals($validarExis->RegraValidacao($dois), false);
        $this->assertEquals($validarExis->RegraValidacao($tres), false);

    }


    public function testCont(){

        $aumet = new AumentarContadoVideo();
        $vide = videoslivre::find(6);
        $cont = $vide->contador_visualizacao;
        $aumet->Contar(6);

        $vide = videoslivre::find(6);

        $this->assertEquals($vide->contador_visualizacao, ($cont + 1));

    }

    public function testVideosteleini(){
        $pegarvideosPopulares = new GetVideosMaisPopupinin();
        $dados = $pegarvideosPopulares->PegarDados(null);
        // dd($dados);
        $exi = 0;
        foreach ($dados as  $v) {
            // $this->assertEquals($v->u, $id);
            $this->assertEquals($v->status, true);
            if($exi != 0)
            $this->assertEquals(($v->contador_visualizacao <= $exi), true);
            $exi = $v->contador_visualizacao;
        }
    }

    public function testValidar_professor_de_video(){
        $validarPro = new ValidarProfessorDoVideo();

        $teste1 = $validarPro->ValidarSeAhPermissao(4, 6);
        $teste2 = $validarPro->ValidarSeAhPermissao(4, 80);
        $teste3 = $validarPro->ValidarSeAhPermissao(1, 6);
        $teste4 = $validarPro->ValidarSeAhPermissao(10000, 6);
        $this->assertEquals($teste1, true);
        $this->assertEquals($teste2, false);
        $this->assertEquals($teste3, false);
        $this->assertEquals($teste4, false);

    }



    function testValidar_permissao_de_acesso_video(){
        $validarAuthordoVideoObj = new ValidarAuthorDoVideo();
        $validarVideoPeloADM = new VerificarVideoAtivoPeloADM();

        $teste1 = $validarAuthordoVideoObj->ValidarSeAhPermissao(4, 5);

        $videComProfessorErrado  = $validarAuthordoVideoObj->ValidarSeAhPermissao(1, 5);

        $professorComVideoQueNaoExiste = $validarAuthordoVideoObj->ValidarSeAhPermissao(1, 10000);

        $videoNaoAtivadoPeloADM =  $validarVideoPeloADM->RegraValidacao(false);

        $videoAtivadoPeloAdm =  $validarVideoPeloADM->RegraValidacao(true);

        $this->assertEquals($teste1 , true);
        $this->assertEquals($videComProfessorErrado, false);
        $this->assertEquals($professorComVideoQueNaoExiste, false);

        $this->assertEquals($videoAtivadoPeloAdm, true);
        $this->assertEquals($videoNaoAtivadoPeloADM, false);
    }
}
