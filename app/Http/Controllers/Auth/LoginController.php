<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;
use Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }

    public function login() {
        return view('auth.login');
    }

    public function postLogin(Request $r){
        $username = $r->input('username');
        $password = $r->input('password');
        $remember = ($r->input('remember')) ? true : false;
        // dd(Auth::attempt(['email' => $username, 'password' => $password],$remember));
        if (Auth::attempt(['username' => $username, 'password' => $password],$remember)) {
            if (Auth::viaRemember()) {
              return redirect()->intended(route('backoffice'));
            }

            return redirect(route('backoffice'));
        }
          // dd("ini");
          Session::flash('title', 'Gagal!');
          Session::flash('text', 'Username/Password Salah!');
          Session::flash('icon', 'error');
          return redirect()->back();
    }

    public function logout(){
        Auth::logout();
        return redirect(url('/'));
    }
}
