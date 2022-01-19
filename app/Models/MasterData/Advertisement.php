<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Model;
use App\Models\Membership\DokumenRepo;
class Advertisement extends Model
{
	protected $table = 'advertisements';
	protected $with = array('dokumen_repo');
    public $timestamps = false;

    public function dokumen_repo()
    {
        return $this->belongsTo('App\Models\Membership\DokumenRepo', 'id', 'reff_id')->where('reff_type', 303);
    }
}
