<?php

use Illuminate\Support\Facades\Route;

Route::prefix('membership/auth')->group(function () {
  Route::get('index', 'MembershipRegistrasi@login')->name('indexMembership');
  Route::get('logouts', 'MembershipRegistrasi@logouts')->name('logoutsMembership');
  Route::get('registrasi', 'MembershipRegistrasi@registrasi')->name('registrasiMembership');
  Route::get('term-condition', 'MembershipRegistrasi@termCondition')->name('registrasiTermCondition');
  Route::get('login', 'MembershipRegistrasi@login')->name('loginMembership');
  Route::post('login/store', 'MembershipRegistrasi@postLogin')->name('postLoginMembership');
  Route::post('store', 'MembershipRegistrasi@postRegistrasi')->name('postRegistrasiMembership');
  Route::get('check-account/{email}/{username}', 'MembershipRegistrasi@checkAkun')->name('checkAkun');
  Route::get('check-forgot/{inputan}', 'MembershipRegistrasi@checkForgot')->name('checkForgot');
  Route::get('forgot-password', 'MembershipRegistrasi@vForgotPassword')->name('vForgotPassword');
  Route::post('forgot-password/store', 'MembershipRegistrasi@postForgot')->name('postForgot');
});
