<?php

namespace App\Models\Membership;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
  protected $table = 'membership_account';
  protected $primaryKey = 'id';
  protected $fillable = [
    'user_id',
    'email',
    'member_no',
    'full_name',
    'member_type',
    'identity_no',
    'address',
    'province_id',
    'city_id',
    'postal_code',
    'phone_no',
    'birth_place',
    'birth_date',
    'gender',
    'member_since',
    'description'

  ];
}
