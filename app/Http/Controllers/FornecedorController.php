<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fornecedor;

class FornecedorController extends Controller
{
    public function index() {
        return view('app.fornecedor.index');
    }
// php com ternario condição ? verdade : False



    public function listar(Request $request){



        $fornecedores = Fornecedor::with(['produtos'])->where('nome', 'like', '%'.$request->input('nome').'%')
        ->where('uf', 'like', '%'.$request->input('uf').'%')
        ->where('site', 'like', '%'.$request->input('site').'%')
        ->where('email', 'like', '%'.$request->input('email').'%')    
        //paginação    
        ->paginate(5);



        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores, 'request' => $request->all()]); //request é para corrigir paginação
    }


    public function adicionar(Request $request) {
        $msg = '';

        //inserção
        if($request->input('_token') != '' && $request->input('id') == '') {


            
            //cadastro
            $regras = [
                'nome' => 'required|min:3|max:40',
                'site' => 'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'email',
            ];

            $feedback = [
                'required' => 'O campo :attribute deve ser preenchido!',
                'nome.min' => 'O nome deve possuir pelo menos 3 caracteres',
                'nome.max' => 'O nome deve possuir no maximo 40 caracteres',
                'uf.min' => 'O campo :attribute deve possuir pelo menos 2 caracteres',
                'uf.max' => 'O campo :attribute deve possuir no maximo 2 caracteres',
                'email.email' => 'Informe um email valido!'
            ];

            $request->validate($regras, $feedback);
            $fornecedor =  new Fornecedor();
            $fornecedor->create($request->all());

            $msg = 'Cadastro realizado com sucesso!';

            //edição

        } if($request->input('_token') != '' && $request->input('id') != '') {
            $fornecedor =Fornecedor::find($request->input('id'));
            $update = $fornecedor->update($request->all());

            if($update) {
                $msg = 'Atualização realizada com sucesso!';
            }else {
                $msg = 'Erro ao tentar atualizar o registro!';
            }
            return redirect()->route('app.fornecedor.editar', ['id' => $request->input('id') , 'msg' => $msg]);

           



        }
        return view('app.fornecedor.adicionar', ['msg' => $msg]);
    }

    public function editar($id, $msg = '') {       

        $fornecedor = Fornecedor::find($id);

        return view('app.fornecedor.adicionar', ['fornecedor' => $fornecedor, 'msg' => $msg]);

        dd($fornecedor);

    }

    public function excluir($id) {
        Fornecedor::find($id)->delete();
       // Fornecedor::find($id)->forceDelete(); exclui permanente

        return redirect()->route('app.fornecedor');

    }




}
