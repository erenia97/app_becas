<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipo_becas extends Model
{
    //
    protected $table = 'tipo_beca';
     protected $primaryKey = 'id_becas';  
         protected $fillable = [
         

 		 'nombre' ,];

}
