<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usr_profesion extends Model
{
    //
     protected $table = 'usr_profesion';
    protected $fillable = [
		  'id_profesion' ,
		  'id_usuario' ,
		  'id_carreras' ,
		  'dato_adjunto',

];

		  public function usuario()
  {
      return $this->hasOne('App\usuarios', 'id_usuario', 'id_usuario');
  }

     public function carrera()
  {
      return $this->hasOne('App\carreras', 'id_carreras', 'id_carreras');
  }

   ¿

}
