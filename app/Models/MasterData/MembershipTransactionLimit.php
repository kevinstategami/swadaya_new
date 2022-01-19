<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Model;

class MembershipTransactionLimit extends Model
{
    
	protected $table = 'membership_transaction_limits';
	protected $with = array('membership');


    public function membership()
    {
        return $this->belongsTo('App\Models\Membership\Member', 'user_id', 'user_id');
    }

}
