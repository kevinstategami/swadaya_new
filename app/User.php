<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'users';
    protected $with = array('membershipAccount', 'invoiceAccount');

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function membershipTransactionLimit(){
        return $this->hasMany('App\Models\Membership\MembershipTransactionLimit');
    }

    public function membershipAccount(){
        return $this->belongsTo('App\Models\Membership\Member', 'id', 'user_id');
    }

    public function invoiceAccount(){
        return $this->belongsTo('App\Models\Transaction\Invoice', 'id', 'user_id');
    }
}
