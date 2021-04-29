<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;//trazendo model responsavel para o contexto
use App\MotivoContato;


class ContatoController extends Controller
{
    public function contato(Request $request) {

     $motivo_contatos = MotivoContato::all();  

       /* echo '<pre>';
        print_r($request->all());
        echo '</pre>';

        //recuperando um dado especifico
        echo '<pre>';
        echo $request->input('nome');
        echo '</pre>';
        //var_dump($_POST);*/

        //salvar dados        
        /*$contato = new SiteContato();
        $contato->nome = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->email = $request->input('email');
        $contato->motivo_contato = $request->input('motivo_contato');
        $contato->mensagem = $request->input('mensagem');
        //print_r($contato->getAttributes());
        $contato->save();*/

        //segunda maneira
     /*   $contato = new SiteContato();
       // $contato->fill($request->all());
       // $contato->save();
       
       //terceira maneira salvando tudo de uma vez
         $contato->create($request->all());
        
      //  print_r($contato->getAttributes());*/

        return view('site.contato', ['titulo' => 'Contato', 'motivo_contatos' => $motivo_contatos]);
    }

        public function salvar(Request $request) {


        //realizar a validação de formulários dos dados recebidos no request

        $regras = [
          'nome' => 'required|min:3|max:40|unique:site_contatos', //nomes com 3min e max 40 unique compara se já existe o nome no banco
          'telefone' => 'required',
          'email' => 'email',
          'motivo_contatos_id' => 'required',
          'mensagem' => 'required|max:2000'   
          ];

        $feedback = [
          'unique' => 'já existe esse nome no banco',
          'nome.min' => 'Campo :attribute necessita no minimo 3 letras',
          'nome.max' => 'Campo :attribute necessita no maximo 40 letras',
          'required' => 'Campo :attribute necessita ser prenchido',
          'email.email' => ' Campo :attributes necessita ser prenchido com um formato valido',  
          'mensagem.max' => 'Campo :attributes pode ter no máximo 2000 letras'        
        ] ;

        $request->validate($regras, $feedback);
        
          SiteContato::create($request->all());
          return redirect()->route('site.index');

    }

}
