<?php

namespace App\Models\Transaction;

use Illuminate\Database\Eloquent\Model;

class WalletHistory extends Model
{
    protected $table = 'wallet_histories';
    protected $primaryKey = 'id';
    protected $with = array('membershipAccount');

    public function membershipAccount(){
        return $this->belongsTo('App\Models\Membership\Member', 'user_id', 'user_id');
    }
    public function invoice(){
        return $this->belongsTo('App\Models\Transaction\Invoice', 'invoice_id', 'id');
    }
}
