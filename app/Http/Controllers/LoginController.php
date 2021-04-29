<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    //
    public function index(Request $request) {

        $erro = '';
      if($request->get('erro') == 1) {
        $erro = 'Login ou senha invalidos';
      }

      if($request->get('erro') == 2) {
        $erro = 'Necessário realizar login para ter acesso a página';
      };

        return view('site.login', ['titulo' => 'login', 'erro' => $erro]);

    }

    public function autenticar(Request $request) {
        //regras para validação

        $regras = [
            'usuario' => 'email|required|min:3',
            'senha' => 'required|min:3'   
        
        ];
        //retorno caso invalidado
        $feedback = [
            'usuario.email' => 'Informe um email valido!',
            'required' => 'requirida uma senha'
        ];

        $request->validate($regras, $feedback);

        //recuperamos os parametros do formulário
        
        $email = $request->get('usuario');

        $password = $request->get('senha');


        //iniciar o Model User

        $user = new User();

        $usuario = $user->where('email', $email)->where('password', $password)->get()->first();
        
        
        if(isset($usuario->name)) {
          session_start();
          $_SESSION['nome'] = $usuario->name;
          $_SESSION['email'] = $usuario->email;
          return redirect()->route('app.home');
        } else {
            return redirect()->route('site.login', ['erro' => 1]);

             }
    
        ;


       // print_r($request->all());
    }

    public function sair() {
      session_destroy();

      return redirect()->route('site.index');
    }

}
