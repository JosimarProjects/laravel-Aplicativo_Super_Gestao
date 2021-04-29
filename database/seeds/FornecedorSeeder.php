<?php

use Illuminate\Database\Seeder;
use App\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //adicionando dados metodo1 instaciando um objeto
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'fornecedor 100';
        $fornecedor->site = '100.com.br';
        $fornecedor->uf = 'SP';
        $fornecedor->email = 'dadsad@fsfdfs.com';        
        $fornecedor->save();

        //adicionando dados metodo create (atenção para o atributo fillable da classe)
        Fornecedor::create([
            'nome' => 'Fornecedor 200',
            'site' => 'fornecedor200.com.br',
            'uf' => 'SP',
            'email' => 'Fornecedor@sdsd.com.br',
        ]);

        //insert

        DB::table('fornecedores')->insert([
            'nome' => 'Fornecedor 500',
            'site' => 'fornecedor500.com.br',
            'uf' => 'SP',
            'email' => '500Fornecedor@sdsd.com.br',
        ]);
    }
}
