<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class beneficios extends Model
{
    //

    protected $table = 'beneficios';
       protected $primaryKey = 'id_beneficio';  
   
    protected $fillable = [
       
        	  
  			  'id_becas' ,
			  'descripcion' ,
			  'lugar',
			  'cobertura',
			  'Tiempo' ,

			   
    	];

    public $timestamps = false;

  public function becas()
  {
      return $this->hasOne('App\becas', 'id_becas', 'id_becas');
  }

}

