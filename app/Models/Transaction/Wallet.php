<?php

namespace App\Models\Transaction;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{

    protected $table = 'wallets';
    protected $primaryKey = 'id';
    protected $with = array('membershipAccount');

    public function membershipAccount(){
        return $this->belongsTo('App\Models\Membership\Member', 'user_id', 'user_id');
    }
}
