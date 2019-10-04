<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contacto extends Model
{
    //



    protected $table = 'contacto';
      protected $primaryKey = 'id_contacto';  
    protected $fillable = [
       
        	 
			  'id_entidad' ,
			  'nombre' ,
			  'apellido' ,
			  'telefono',
			  'correo',
			   
    	];

          public $timestamps = false;

    	  public function entidades()
  {
      return $this->hasOne('App\entidades', 'id_entidad', 'id_entidad');
  }
}
