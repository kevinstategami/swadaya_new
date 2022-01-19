<?php

namespace App\Models\Membership;

use Illuminate\Database\Eloquent\Model;

class Simpanan extends Model
{
protected $table = 'simpanan';
protected $primaryKey = 'id';
protected $fillable = [
  'user_id',
  'member_no',
  'email',
  'invoice_id',
  'simpanan_no',
  'amount',
  'admin_fee',
  'total',
  'simpnana_type_id',
  'deposit_date'
];

public function invoice(){

  return $this->hasMany('App\Models\Transaction\Invoice', 'invoice_id', 'id');

}

}
