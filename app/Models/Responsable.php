<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Responsable extends Model
{
    use CrudTrait;

     /*
	|--------------------------------------------------------------------------
	| GLOBAL VARIABLES
	|--------------------------------------------------------------------------
	*/

    protected $table = 'responsables';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $guarded = ['id'];
    protected $fillable = ['nombre', 'apellidopaterno', 'apellidomaterno', 'clavedeelector','curp', 'region', 'telefono', 'email', 'facebook', 'twitter', 'whatsapp', 'nombramiento', 'municipio_id', 'nombramiento_id', 'region_id'];
    protected $hidden = ['curp', 'region', 'telefono', 'email', 'facebook', 'twitter', 'whatsapp'];
    protected $dates = [];

    /*
	|--------------------------------------------------------------------------
	| FUNCTIONS
	|--------------------------------------------------------------------------
	*/

    /*
	|--------------------------------------------------------------------------
	| RELATIONS
	|--------------------------------------------------------------------------
	*/

	 public function municipio()
    {
        return $this->hasOne('App\Models\Municipio','id' ,'municipio_id');

    }


    public function nombramiento()
    {
        return $this->hasOne('App\Models\Nombramiento','id' ,'nombramiento_id');

    }

    public function region()
    {
        return $this->hasOne('App\Models\Region','id' ,'region_id');

    }



    /*
	|--------------------------------------------------------------------------
	| SCOPES
	|--------------------------------------------------------------------------
	*/

    /*
	|--------------------------------------------------------------------------
	| ACCESORS
	|--------------------------------------------------------------------------
	*/

    /*
	|--------------------------------------------------------------------------
	| MUTATORS
	|--------------------------------------------------------------------------
	*/
}
