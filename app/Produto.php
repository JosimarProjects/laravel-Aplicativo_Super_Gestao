<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    //
    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id'];

    public function produtoDetalhe() {

        return $this->hasOne('App\ProdutoDetalhe');
        //produto tem um produto detalhe // 1 registro relacionado em produto_detalhes (fk)->produto_id //parametro vem de produtos (pk)-> id
    }
}
