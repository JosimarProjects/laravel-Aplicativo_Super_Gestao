<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    //
    


                //model que carrega relacionamento de muitos para muitos e modelo que guarda o relacionamento
//modelo padronizado

    public function produtos() {
      //  return $this->belongsToMany('App\Produto', 'pedidos_produtos');
      return $this->belongsToMany('App\item', 'pedidos_produtos', 'pedido_id', 'produto_id')->withPivot('id','created_at', 'updated_at');


      /*
      1- Modelo do relacionamento nxn em realação o Modelço que estamos implementando
      2- é a tabela auxiliar que armazena os registros de relacionamento
      3- Representa o nome da Fk da tabela mapeada pelo model na tabela de relacionamento
      4- representa o nome da FK da tablea mapeada pelo model utilizado no relacionamento
      
      */




    }
}
