<?php

namespace App\Models\Compro;

use Illuminate\Database\Eloquent\Model;

class JenisKoperasi extends Model
{
    protected $table = 'jenis_koperasis';
	protected $with = array('dokumen');


    public function dokumen()
    {
        return $this->belongsTo('App\Models\Membership\DokumenRepo', 'id', 'reff_id')->where('reff_type', 301);
    }
}
