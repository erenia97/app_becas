<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usr_idioma extends Model
{
    // 

	    protected $table = 'usr_idioma';

     protected $fillable = [
 

   'id_usridioma' ,
  'id_idioma' ,
  'id_nivel' ,
  'id_usuario' ,

    ];




    public function idioma()
  {
      return $this->hasOne('App\idioma', 'id_idioma', 'id_idioma');
  }

     public function nivel()
  {
      return $this->hasOne('App\nivel', 'id_nivel', 'id_nivel');
  }

      public function usuario()
  {
      return $this->hasOne('App\usuarios', 'id_usuario', 'id_cliente');
  }


}