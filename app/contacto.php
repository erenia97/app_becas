<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contacto extends Model
{
    //



    protected $table = 'contacto';
    protected $fillable = [
       
        	 'id_contacto',
			  'id_entidad' ,
			  'nombre' ,
			  'apellido' ,
			  'telefono',
			  'correo',
			   
    	];

    	  public function entidades()
  {
      return $this->hasOne('App\entidades', 'id_entidad', 'id_entidad');
  }
}
