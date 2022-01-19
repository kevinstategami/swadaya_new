<?php

namespace App\Http\Controllers\Membership;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SimpananController extends Controller
{
    public function index(){
      return view('registrasi.home.simpanan.index');
    }

}
