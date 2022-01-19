<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
  protected $table = 'banks';
  protected $primaryKey = 'id';
  protected $fillable = [
    'bank_code',
    'bank_name',
    'account_number',
    'swift_code',
    'account_name'
  ];
}
