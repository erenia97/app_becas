<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class solicitud extends Model
{
    //
    protected $table = 'solicitud';
    protected $fillable = [

    	'id_requisito',
		  'id_beca',
       'id_cliente',
       'edad',
		  'profesion' ,
		  'sexo',];

		    public function becas()
  {
      return $this->hasOne('App\becas', 'id_beca', 'id_beca');
  }
public function becas()
  {
      return $this->hasOne('App\usuarios', 'id_cliente', 'id_cliente');
  }
}
