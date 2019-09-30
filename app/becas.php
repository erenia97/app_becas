<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class becas extends Model
{
    //
	protected $table = 'becas';
    protected $fillable = [
         
        	  'id_becas' ,
			  'id_entidad' ,
			  'id_tipo' ,
			  'descripcion' ,
			  'lugar' ,
			  'fecha_inicio',
			  'fecha_fin',
			  'id_grado' ,
			  'Nombre' ,

			   
    	];

  public function entidad()
  {
      return $this->hasOne('App\entidades', 'id_entidad', 'id_entidad');
  }
  public function tipo_beca()
  {
      return $this->hasOne('App\tipo', 'id_tipo', 'id_tipo');
  } 

}
