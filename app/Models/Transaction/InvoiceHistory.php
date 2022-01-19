<?php

namespace App\Models\Transaction;

use Illuminate\Database\Eloquent\Model;

class InvoiceHistory extends Model
{
    protected $table = 'invoice_histories';
    protected $primaryKey = 'id';
    protected $with = array('invoice');

    public function invoice(){
      return $this->belongsTo('App\Models\Transaction\Invoice', 'invoice_code','invoice_code');
      
  }
}
