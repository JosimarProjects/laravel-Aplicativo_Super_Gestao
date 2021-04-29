<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    protected $table = 'produtos';
    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id', 'fornecedor_id'];

    public function itemDetalhe() {

        // segundo parametro nome da coluna que possui fk, segundo primary
        return $this->hasOne('App\ItemDetalhe', 'produto_id', 'id');
        //produto tem um produto detalhe // 1 registro relacionado em produto_detalhes (fk)->produto_id //parametro vem de produtos (pk)-> id
    }

    public function fornecedor() {
        return $this->belongsTo('App\Fornecedor');
    }


    public function pedidos() {
        return $this->belongsToMany('App\pedido', 'pedidos_produtos', 'produto_id', 'pedido_id');
    }
}
