<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class becas extends Model
{
    //
	protected $table = 'becas';
   protected $primaryKey = 'id_becas';  
    protected $fillable = [
         
        	 
			  'id_entidad' ,
			  'id_tipo' ,
			  'descripcion' ,
			  'lugar' ,
			  'fecha_inicio',
			  'fecha_fin',
			  'id_grado' ,
			  'Nombre' ,
        'nombre_carrera' ,
        'tipo_beca' ,

			   
    	];
       public $timestamps = false;

  public function entidad()
  {
      return $this->hasOne('App\entidades', 'id_entidad', 'id_entidad');
  }
  public function tipo_beca()
  {
      return $this->hasOne('App\tipo', 'id_tipo', 'id_tipo');
  } 

}
