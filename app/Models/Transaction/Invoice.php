<?php

namespace App\Models\Transaction;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'invoices';
    protected $primaryKey = 'id';
    protected $with = array('user');
    protected $fillabel = [
      'user_id',
      'member_no',
      'email',
      'invoice_code',
      'amount',
      'admin_fee',
      'additional_amount',
      'total_amount',
      'payment_method_id',
      'target_bank_id',
      'target_bank_name',
      'target_bank_account_name',
      'target_bank_account_no',
      'invoice_type',
      'invoice_type_id',
      'status'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\Membership\Member', 'member_no', 'member_no');
    }

    public function simpananType(){

      return $this->belongsTo('App\Models\MasterData\SimpananType', 'invoice_type_id', 'id');
      
    }
}
