<?php

namespace App\Models\Membership;

use Illuminate\Database\Eloquent\Model;

class Penarikan extends Model
{
	protected $with = array('user');
    public function user()
    {
        return $this->belongsTo('App\Models\Membership\Member', 'member_no', 'member_no');
    }
}
