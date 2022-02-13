<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;
use App\Models\Membership\Member;
use Session;
use App\User;
use App\Models\Membership\ReferalCode;
use App\Providers\RouteServiceProvider;
use Mail;

class MembershipRegistrasi extends Controller
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
    protected $redirectTo = RouteServiceProvider::HOME_MEMBERSHIP;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }

    public function index(){
      return view('registrasi.auth.signup');
      // return view('registrasi.mobile');
    }
    public function registrasi(Request $request){

      if($request->referalCode == null){
        $referalCode = '';

      }else{
        $referalCode = $request->referalCode;

      }

      return view('registrasi.auth.signup')
      ->with('referalCode', $referalCode);
    }
    public function vForgotPassword(){
      return view('registrasi.auth.forgot');
    }

    public function postForgot(Request $request){

      $pwd = $this->quickRandom(10);
      $user = User::where('username', $request->username)->orWhere('email', $request->username)->first();
      if($user){
        $user->password = bcrypt($pwd);
        $user->save();

        Mail::send('registrasi.email.forgotPassword', ['pwd' => $pwd, 'user' => $user], function ($m) use ($pwd, $user) {
          $m->from('no-reply@cakra-tech.co.id', 'Songgomas - Reset Password');
          $m->to($user->email,'Reset Password','Songgomas - Reset Password');
        });

        $info = "Berhasil";
        $colors = "green";
        $icons = "fas fa-check-circle";
        $alert = "Silakan cek email untuk melihat password terbaru akun anda!";

        Session::flash('info', $info);
        Session::flash('alert', $alert);
        Session::flash('colors', $colors);
        Session::flash('icons', $icons);

        return redirect(url('membership/auth/login'));

      } else {
        $info = "Gagal";
        $colors = "red";
        $icons = "fas fa-times-circle";
        $alert = "Maaf akun anda tidak terdaftar!";

        Session::flash('info', $info);
        Session::flash('alert', $alert);
        Session::flash('colors', $colors);
        Session::flash('icons', $icons);

        return redirect()->back();
      }



    }
    public function checkAkun($email, $username){
      //dd($username);
      $checkEmail = User::where('email','like', '%'.$email.'%')
      ->orWhere('username','like','%'.$username.'%')->first();

      if($checkEmail){
        $msg = "avail";
      }else{
        $msg = "not_avail";
      }

      $data[] = array(
        "status" => $msg
      );

      return json_encode($data);
    }

    public function checkForgot($inputan){
      //dd($username);
      $checkEmail = User::where('email', $inputan)->first();
      if($checkEmail == null){
        $checkUsername = User::where('username', $inputan)->first();
        if($checkUsername == null){
          $msg = "no_data";
        }else{
          $msg = "avail";
        }
      }else{
        $msg = "avail";
      }

      $data[] = array(
        "status" => $msg
      );

      return json_encode($data);
    }

    public function login(){
      return view('registrasi.auth.login');
    }

    public function postLogin(Request $r){
      $username = $r->input('username');
      $password = $r->input('password');
      $remember = ($r->input('remember')) ? true : false;
      if (Auth::attempt(['username' => $username, 'password' => $password],$remember)) {
        // dd(Auth::user()->type);
        if(Auth::user()->type == "MEMBER"){

          if (Auth::viaRemember()) {
            return redirect()->intended('/membership/index/home');
          }

          return redirect(url('membership/index/home'));

        }else{

          if (Auth::viaRemember()) {
            return redirect()->intended('/');
          }

          return redirect(url('/'));

        }

      }
          // dd("ini");
      $info = "Error";
      $colors = "red";
      $icons = "fas fa-ban";
      $alert = "Username atau Password salah!";

      Session::flash('info', $info);
      Session::flash('alert', $alert);
      Session::flash('colors', $colors);
      Session::flash('icons', $icons);

      return redirect(url('membership/auth/login'));

    }
    public function postRegistrasi(Request $request){

      //dd($request->all());

      $user = new User();
      $user->name = $request->fullName;
      $user->username = $request->username;
      $user->email = $request->email;
      $user->type = "MEMBER";
      $user->password = bcrypt($request->password);
      $user->save();

      if($request->referalCode){
        $memberData = Member::where('member_no', $request->referalCode)->first();
        if($memberData){
          $referalCode = new ReferalCode();
          $referalCode->user_id = $user->id;
          $referalCode->member_no = $memberData->member_no;
          $referalCode->email = $user->email;
          $referalCode->code = $memberData->member_no;
          $referalCode->status = 1;
          $referalCode->save();
        }
      }


      $info = "Pendaftaran Berhasil";
      $colors = "green";
      $icons = "fas fa-check-circle";
      $alert = "Silakan login akun anda!";

      Session::flash('info', $info);
      Session::flash('alert', $alert);
      Session::flash('colors', $colors);
      Session::flash('icons', $icons);

      return redirect(url('membership/auth/login'));
    }
    public function logouts(){
      Auth::logout();
      return redirect(url('membership/auth/login'));
    }

    public static function quickRandom($length = 16)
    {
      $pool = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

      return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
    }

    public function indexProfil(){

      $member = Member::where('user_id', Auth::user()->id)->first();

      return view('registrasi.akun.index_profil')
      ->with('member', $member);
    }

    public function termCondition(){
      return view('registrasi.auth.term-condition');
    }
  }
