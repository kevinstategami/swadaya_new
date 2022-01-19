<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;
use Illuminate\Http\Request;
use Session;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
    //     $this->middleware('guest');
    // }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function register() {
        return view('auth.register');
    }

    public function postRegister(Request $r){
        $user = new User;
        $user->name = $r->input('name');
        $user->username = $r->input('username');
        $user->email = $r->input('email');
        $user->password = bcrypt($r->input('password'));
        $user->save();
        if($user){
            if (Auth::attempt(['username' => $r->input('username'), 'password' => $r->input('password')])) {
                Session::flash('title', 'Berhasil!');
                Session::flash('text', 'Selamat anda telah berhasil mendaftar akun!');
                Session::flash('icon', 'success');
                return redirect(url('/'));
            }
        }

        Session::flash('title', 'Gagal!');
        Session::flash('text', 'Username/Password Salah!');
        Session::flash('icon', 'error');
        return redirect()->back();
    }
}
