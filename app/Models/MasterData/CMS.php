<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Model;

class CMS extends Model
{
    protected $table = 'c_m_s';
	protected $with = array('dokumen');


    public function dokumen()
    {
        return $this->belongsTo('App\Models\Membership\DokumenRepo', 'id', 'reff_id');
    }
}
