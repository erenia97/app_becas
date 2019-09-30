<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class entidades extends Model
{
    //
      
	protected $table = 'entidades';
	 protected $primaryKey = 'id_entidad';
    protected $fillable = [
        
					  
					  'id_tipo',
					  'Nombre',
					  'Razon_social',
					  'id_pais',
					  'pagina_Web',
					  'sector',
					  'logo',
					  'direccion',
					  'Nit',
					  'telefono',         


					  
    	];


  public $timestamps = false;
  public function tipo_usuario()
  {
      return $this->hasOne('App\User', 'id_tipo', 'id_tipo');
  }
    public function pais()
  {
      return $this->hasOne('App\Pais', 'id_pais', 'id_pais');
  }

}



