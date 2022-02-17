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
  'deposit_date',
  'simpanan_type_id'
];

public function invoice(){

  return $this->hasMany('App\Models\Transaction\Invoice', 'invoice_id', 'id');

}

public function simpananType(){

  return $this->belongsTo('App\Models\MasterData\SimpananType', 'simpanan_type_id', 'id');

}

}
