<?php

namespace Tests\Feature;

use App\Classes\pegardados\PegarDadosDeAula;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Classes\Permissoes\ValidarPermissaoAdm;
use App\Classes\Permissoes\VerPerDePRoOUADM;
use App\Classes\videoslivres\GetVideosDoProf;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testAutorizacaoedm(){
        $auto = new ValidarPermissaoAdm();
        $retorno = $auto->RegraParaVerSeOUsuarioTemAutorizacao('1');
        $this->assertEquals(true, $retorno);


        $retorno = $auto->RegraParaVerSeOUsuarioTemAutorizacao('3');
        $this->assertEquals(false, $retorno);


        $retorno = $auto->RegraParaVerSeOUsuarioTemAutorizacao('4');
        $this->assertEquals(false, $retorno);
    }



    public function testValidar_prof_ou_adm(){
        $valida = new VerPerDePRoOUADM();
        $va = $valida->RegraParaVerSeOUsuarioTemAutorizacao('4');
        $this->assertEquals($va, true);
    }


    public function testAula_dados(){
        $pegarAula = new PegarDadosDeAula();
        $aula = $pegarAula->PegarDados('8');
        $this->assertEquals($aula->id, 4);
    }

    public function testAula_quenaoexiste(){
        $pegarAula = new PegarDadosDeAula();
        $aula = $pegarAula->PegarDados('500');
        $this->assertEquals($aula, null);
    }

    public function testDatabase()
    {
        // Make call to application...
        $this->assertDatabaseHas('users', [
            'email' => 'del@gmail.com',
        ]);
    }


}
