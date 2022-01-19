<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
	protected $table = 'cities';
	protected $with = array('province');
    public $timestamps = false;


    public function province()
    {
        return $this->belongsTo('App\Models\MasterData\Province', 'idProv');
    }
}
