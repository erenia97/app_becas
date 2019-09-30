<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class carreras extends Model
{
    //
    protected $table = 'carreras';
      protected $primaryKey = 'id_carrera';	
    protected $fillable = [
        
				'lista',  'estado', 'id_codexterno', 'id_carrera_pareja', 'carrera',       
    	];


    

     
}
