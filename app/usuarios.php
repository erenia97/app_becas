<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usuarios extends Model
{
    //
    protected $table = 'cliente';
    protected $primaryKey = 'id_cliente';
    protected $fillable = [

		  'id_profesion' ,
		  'id_pais' ,
		  'id_tipo' ,
		  'Nombre' ,
		  'Apellido' ,
		  'Correo' ,
		  'telefono' ,
		  'direccion' ,
		  'fecha_nacimiento',
		  'sexo' ,
		];

  public $timestamps = false;

    public function carreras()
  {
      return $this->hasOne('App\carreras', 'id_profesion', 'id_carrera');
  }

     public function pais()
  {
      return $this->hasOne('App\pais', 'id_pais', 'id_pais');
  }

      public function tipo_usuario()
  {
      return $this->hasOne('App\User', 'id_tipo', 'id_tipo');
  }

}
