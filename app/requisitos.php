<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class requisitos extends Model
{
    //

    protected $table = 'requisitos';
    protected $fillable = [

    	 'id_requisito',
		  'id_beca',
		  'edad',
		  'profesion' ,
		  'sexo',];

		   public function becas()
  {
      return $this->hasOne('App\becas', 'id_beca', 'id_beca');
  }

}