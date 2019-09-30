<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class beneficios extends Model
{
    //

    protected $table = 'benificios';
    protected $fillable = [
       
        	  'id_beneficio',
  			  'id_becas' ,
			  'descripcion' ,
			  'lugar',
			  'cobertura',
			  'Tiempo' ,

			   
    	];

  

  public function becas()
  {
      return $this->hasOne('App\becas', 'id_becas', 'id_becas');
  }

}

