<?php

use Illuminate\Database\Seeder;
use App\SiteContato;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*$contato = new SiteContato();
        $contato->nome = 'sistema sg';
        $contato->telefone = '(11) 1111-2222';
        $contato->email = 'contato@sg.com.br';
        $contato->motivo_contato = 1 ;
        $contato->mensagem = 'seja bem vindo';
        $contato->save();*/


        factory(SiteContato::class, 100)->create();



    }
}
