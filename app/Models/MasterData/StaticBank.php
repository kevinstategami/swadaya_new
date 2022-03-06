<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Model;

class StaticBank extends Model
{
  protected $table = 'static_bank';
  protected $primaryKey = 'id';
  protected $fillable = [
    'bank_name',
    'bank_fullname'
  ];
}
