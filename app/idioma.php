<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class idioma extends Model
{
    //

    protected $table = 'idioma';

 protected $primaryKey = 'id_idioma';
 protected $fillable = [
       
        	
 			'nombre' ,
			   
    	];
    	  public $timestamps = false;   
}
