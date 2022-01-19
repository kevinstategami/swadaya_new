<?php

namespace App\Models\Compro;

use Illuminate\Database\Eloquent\Model;

class StrukturAnggota extends Model
{
    protected $table = 'struktur_anggotas';
	protected $with = array('dokumen');


    public function dokumen()
    {
        return $this->belongsTo('App\Models\Membership\DokumenRepo', 'id', 'reff_id');
    }
}
