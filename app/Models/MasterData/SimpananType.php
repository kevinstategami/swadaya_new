<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Model;

class SimpananType extends Model
{
    
    protected $table = 'simpanan_types';
	protected $with = array('shu');


    public function shu()
    {
        return $this->belongsTo('App\Models\MasterData\Shu', 'shu_id', 'id');
    }
}
