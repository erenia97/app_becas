<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class municipio extends Model
{
    //
      protected $table = 'municipio';
    protected $fillable = [
       
        	 'id_municipio' ,
			  'Id_Pais' ,
			  'nombre_municpio',
						   
    	];

    	  public function pais()
  {
      return $this->hasOne('App\pais', 'Id_pais', 'Id_pais');
  }

}
