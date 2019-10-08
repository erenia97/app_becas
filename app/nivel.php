<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nivel extends Model
{
    //
     protected $table = 'nivel';
      protected $primaryKey = 'id_nivel';

    protected $fillable = [
       
        	 		     'nombre_nivel' ,
						   
    	];
    		  public $timestamps = false;   
}
