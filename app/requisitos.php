<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class requisitos extends Model
{
    //

    protected $table = 'requisitos';
   protected $primaryKey = 'id_requisito';  

    protected $fillable = [

		  'id_beca',
		  'edad',
		  'profesion' ,
		  'sexo',];
    public $timestamps = false;
    
		   public function becas()
  {
      return $this->hasOne('App\becas', 'id_beca', 'id_beca');
  }

}