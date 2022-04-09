<?php

namespace App\Http\Controllers\Membership;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Utils\Query;
use App\Utils\QueryUser;
use App\Models\MasterData\City;
use App\Models\Membership\Member;
use Auth;
use App\User;
use App\Models\MasterData\SimpananType;
use App\Models\Membership\ReferalCode;
use App\Models\Membership\Simpanan;
use App\Models\Membership\DocumenRepo;
use App\Models\Membership\MembershipBank;
use App\Models\Transaction\Invoice;
use App\Models\Transaction\InvoiceHistory;
use Session;
use App\Models\Transaction\Wallet;
use App\Models\Transaction\WalletHistory;
use File;
use DB;
use \Carbon\Carbon;

class HomeController extends Controller
{
    public function detailReferal(){

      $walletHistory = WalletHistory::where('mutation_type','DBRFBNS')->where('user_id', Auth::user()->id)->get();


      if(count($walletHistory) < 1){
        $alert = "Insentif referal tidak tersedia";
        $info = "Informasi";
        $colors = "red";
        $icons = "fas fa-ban";

        return redirect(url('membership/index/home'))
        ->with('info', $info)
        ->with('alert', $alert)
        ->with('colors', $colors)
        ->with('icons', $icons);
      }


      return view('registrasi.home.insentif.detail')
      ->with('walletHistory', $walletHistory);
    }

    public function detailSimpanan(){

      $countSimpanan = Simpanan::with('simpananType')
      ->select('simpanan.*')
      ->join('invoices','invoices.id', '=', 'simpanan.invoice_id')
      ->where('invoices.status','=',2)
      ->where('simpanan.user_id', Auth::user()->id)->count();

      if($countSimpanan == 0){

          $alert = "Simpanan belum tersedia/anda belum upload bukti pembayaran";
          $info = "Informasi";
          $colors = "red";
          $icons = "fas fa-ban";
          return redirect(url('membership/index/home'))
          ->with('info', $info)
          ->with('alert', $alert)
          ->with('colors', $colors)
          ->with('icons', $icons);
      }

        $simpanan = Simpanan::with('simpananType')
        ->select('simpanan.*')
        ->join('invoices','invoices.id', '=', 'simpanan.invoice_id')
        ->where('invoices.status','=',2)
        ->where('simpanan.user_id', Auth::user()->id)->get();

        return view('registrasi.home.simpanan.detail')
        ->with('simpanan', $simpanan);


    }
    public function storeChangeProfile(Request $request){


      if($request->file('fotoProfil') == null){


        $member = Member::where('user_id', $request->userId)->first();
        $member->fullname = $request->namaLengkap;
        $member->identity_no = $request->identityNo;
        $member->phone_no = $request->notelp;
        $member->save();

        $alert = "Perubahan data tersimpan";
        $info = "Informasi";
        $colors = "green";
        $icons = "fas fa-check-circle";
        return redirect(url('membership/index/akun'))
        ->with('info', $info)
        ->with('alert', $alert)
        ->with('colors', $colors)
        ->with('icons', $icons);

      }else{

        if($request->file('fotoProfil')){
          $file = $request->file('fotoProfil');
          if($file->getClientOriginalExtension()=="png"
            || $file->getClientOriginalExtension()=="jpg"
            || $file->getClientOriginalExtension()=="PNG"
            || $file->getClientOriginalExtension()=="JPG"
          ) {

          $member = Member::where('user_id', $request->userId)->first();
          $destinationPath = "user-images/".$member->member_no.'-'.$this->quickRandom(4).'-'.date('Y-m-d');
          if (!is_dir($destinationPath)) {
           File::makeDirectory(public_path()
            .
            '/'.$destinationPath, 0777, true);
         }
         $fileName = $file->getClientOriginalName();
         $fileExt = $file->getClientOriginalExtension();
         $file->move(public_path($destinationPath), $file->getClientOriginalName());

         $img = $destinationPath."/".$fileName;

         // $user = User::find($member->user_id);
         // $user->status_aktivasi = 3;
         // $user->save();
                  //

         $member->fullname = $request->namaLengkap;
         $member->identity_no = $request->identityNo;
         $member->phone_no = $request->notelp;
         $member->path_foto = 'public/'.$img;
         $member->save();


         $alert = "Perubahan data tersimpan";
         $info = "Informasi";
         $colors = "green";
         $icons = "fas fa-check-circle";
         return redirect(url('membership/index/akun'))
         ->with('info', $info)
         ->with('alert', $alert)
         ->with('colors', $colors)
         ->with('icons', $icons);

       }else{
        $alert = "Harap memasukan jenis file yang sesuai";
        $info = "error";
        $colors = "red";
        $icons = "fas fa-ban";
        return redirect(url('membership/index/profil'))
        ->with('info', $info)
        ->with('alert', $alert)
        ->with('colors', $colors)
        ->with('icons', $icons);
      }
    }else{
      $alert = "Koneksi tidak stabil, harap memasukan file kembali";
      $info = "error";
      $colors = "red";
      $icons = "fas fa-ban";
      return redirect(url('membership/index/profil'))
      ->with('info', $info)
      ->with('alert', $alert)
      ->with('colors', $colors)
      ->with('icons', $icons);
    }

      }

  }

    public function profil(){
      $member = Member::where('user_id', Auth::user()->id)->first();
      $referalCode = ReferalCode::where('user_id', Auth::user()->id)->first();
      if($referalCode==null){$code = "";}else{$code = $referalCode->code;}

      // dd($member->path_foto);
      return view('registrasi.akun.index_profil')
      ->with('code', $code)
      ->with('member', $member);
    }
    public function changePassword(){
      return view('registrasi.akun.change_password');
    }
    public function indexAkun(){

      $member = Member::where('user_id', Auth::user()->id)->first();
      if($member == null){

        $info = "Informasi";
        $colors = "red";
        $icons = "fas fa-ban";
        $alert = "Silakan aktivasi akun terlebih dahulu!";

        return redirect(url('/membership/index/aktivasi/'.Auth::user()->id))
        ->with('info', $info)
        ->with('alert', $alert)
        ->with('colors', $colors)
        ->with('icons', $icons);
      }
      if($member != null){
        $referalCode = $member->member_no;
      }else{
        $referalCode = '';
      }
      return view('registrasi.akun.index')
      ->with('referalCode', $referalCode)
      ->with('member', $member);
    }
    public function historyWallet(){

      $history = WalletHistory::with('invoice')->where('user_id', Auth::user()->id)->get();

      // return $history;
      return view('registrasi.home.history.index')
      ->with('history', $history);

    }
    public function index(){

      // $invoiceFirstCheck = Invoice::with('simpananType')->where('user_id', Auth::user()->id)->where('status', 2)
      // ->whereIn('invoice_type',['SW','SP','SS'])->sum('total_amount');

      $countSimpanan = Simpanan::with('simpananType')
      ->select('simpanan.*')
      ->join('invoices','invoices.id', '=', 'simpanan.invoice_id')
      ->where('invoices.status','=',2)
      ->where('simpanan.user_id', Auth::user()->id)->count();

      $invoiceCheck = Invoice::whereIn('invoice_type',['PB','SMT'])->where('user_id', Auth::user()->id)->where('status', 2)->sum('total_amount');
      $invoiceUpdated = Invoice::whereIn('invoice_type',['PB','SMT'])->where('user_id', Auth::user()->id)->where('status', 2)->orderby('id','desc')->value('updated_at');

      $walletBnsTersedia = WalletHistory::select('wallet_histories.*')->join('users','users.id','=','wallet_histories.user_id')->where('users.status_aktivasi','=', 4)
      ->where('mutation_type','DBRFBNS')->where('user_id', Auth::user()->id)->sum('amount');
      $walletBnsTersediaUpdated = WalletHistory::select('wallet_histories.*')->join('users','users.id','=','wallet_histories.user_id')->where('users.status_aktivasi','=', 4)
      ->where('mutation_type','DBRFBNS')->where('user_id', Auth::user()->id)->orderby('id','desc')->value('updated_at');

      $walletBnsSudahDitarik = WalletHistory::where('mutation_type','CRRFBNS')->where('user_id', Auth::user()->id)->sum('amount');
      $walletBnsSudahDitarikUpdated = WalletHistory::where('mutation_type','CRRFBNS')->where('user_id', Auth::user()->id)->orderby('id','desc')->value('updated_at');

      $bnsTersedia = $walletBnsTersedia - $walletBnsSudahDitarik;

      $disabled = Invoice::where('user_id', Auth::user()->id)->where('status', 0)->count() >= 3;

      // Reactivation Member
      $unverif = (boolean)Auth::user()->status_aktivasi == 2;
      $verifInvoiceCheck = Invoice::whereIn('invoice_type',['PB','SMT'])->where('user_id', Auth::user()->id)->whereIn('status', [1, 2])->sum('total_amount');
      if ($unverif) {
        if ($verifInvoiceCheck < 1) {
          $getMember = Member::where('user_id', Auth::user()->id)->first();
          if ($getMember) {
            $now = date('Y-m-d H:m:s');
            $expired = Carbon::parse($getMember->created_at)->addDays(1);
            if ($now > $expired) {
              $member = Member::where('id',$getMember->id)->value('user_id');
              $user = User::find($member);
              $user->status_aktivasi = 0;
              $user->save();
              $simpanan = Simpanan::where('user_id',$member)->delete();
              $wallet = Wallet::where('user_id',$member)->delete();
              $invoice = Invoice::where('user_id',$member)->delete();
              $referalcode = ReferalCode::where('user_id',$member)->delete();
              $data = QueryUser::DeleteMembership('membership_account', $getMember->id);
            }
          }
        }
      }
      // End Reactivation Member
      return view('registrasi.home.index')
      ->with('disabled', $disabled)
      ->with('invoiceUpdated', $invoiceUpdated)
      ->with('invoiceCheck', $invoiceCheck)
      ->with('wallet', $walletBnsSudahDitarik)
      ->with('walletUpdated', $walletBnsSudahDitarikUpdated)
      ->with('bonusReferal', $bnsTersedia)
      ->with('bonusReferalUpdated', $walletBnsTersediaUpdated);
    }

    public function callTransferForm(){
      return view('registrasi.home.wallet.kirim');
    }
    public function callRequestForm(){

      $walletBnsTersedia = WalletHistory::where('mutation_type','DBRFBNS')->where('user_id', Auth::user()->id)->sum('amount');
      $walletBnsSudahDitarik = WalletHistory::where('mutation_type','CRRFBNS')->where('user_id', Auth::user()->id)->sum('amount');

      $bnsTersedia = $walletBnsTersedia - $walletBnsSudahDitarik;
      $disabled = Invoice::where('user_id', Auth::user()->id)->where('status', 0)->count() >= 3;

      if ($disabled) {
        $alert = "Status keanggotaan anda sedang dinonaktifkan!";
        $info = "Peringatan";
        $colors = "red";
        $icons = "fas fa-ban";
        return redirect(url('membership/index/home'))
        ->with('info', $info)
        ->with('alert', $alert)
        ->with('colors', $colors)
        ->with('icons', $icons);
      }
      if($bnsTersedia == 0){

        $alert = "Saldo Insentif tidak tersedia";
        $info = "Peringatan";
        $colors = "red";
        $icons = "fas fa-ban";
        return redirect(url('membership/index/home'))
        ->with('info', $info)
        ->with('alert', $alert)
        ->with('colors', $colors)
        ->with('icons', $icons);

      }

      if(Auth::user()->status_aktivasi != 4){

        $info = "Informasi";
        $colors = "red";
        $icons = "fas fa-ban";
        $alert = "Silakan aktivasi akun anda!";

        Session::flash('info', $info);
        Session::flash('alert', $alert);
        Session::flash('colors', $colors);
        Session::flash('icons', $icons);

        return redirect(url('membership/index/home'));

      }else{
        return view('registrasi.home.wallet.tarik', compact('bnsTersedia'));
      }

    }
    public function callSendForm(){

      $walletBnsTersedia = WalletHistory::where('mutation_type','DBRFBNS')->where('user_id', Auth::user()->id)->sum('amount');
      $walletBnsSudahDitarik = WalletHistory::where('mutation_type','CRRFBNS')->where('user_id', Auth::user()->id)->sum('amount');

      $bnsTersedia = $walletBnsTersedia - $walletBnsSudahDitarik;
      $disabled = Invoice::where('user_id', Auth::user()->id)->where('status', 0)->count() >= 3;

      $member = MembershipBank::where('user_id', Auth::user()->id)->first();

      if ($disabled) {
        $alert = "Status keanggotaan anda sedang dinonaktifkan!";
        $info = "Peringatan";
        $colors = "red";
        $icons = "fas fa-ban";
        return redirect(url('membership/index/home'))
        ->with('info', $info)
        ->with('alert', $alert)
        ->with('colors', $colors)
        ->with('icons', $icons);
      }
      if($bnsTersedia == 0){

        $alert = "Saldo Insentif tidak tersedia";
        $info = "Peringatan";
        $colors = "red";
        $icons = "fas fa-ban";
        return redirect(url('membership/index/home'))
        ->with('info', $info)
        ->with('alert', $alert)
        ->with('colors', $colors)
        ->with('icons', $icons);

      }

      if(Auth::user()->status_aktivasi != 4){

        $info = "Informasi";
        $colors = "red";
        $icons = "fas fa-ban";
        $alert = "Silakan aktivasi akun anda!";

        Session::flash('info', $info);
        Session::flash('alert', $alert);
        Session::flash('colors', $colors);
        Session::flash('icons', $icons);

        return redirect(url('membership/index/home'));

      }else{
        return view('registrasi.home.wallet.kirim', compact('bnsTersedia', 'member'));
      }

    }
    public function activity(){

      $pending = Invoice::where('user_id', Auth::user()->id)
      ->where('status', 0)->get();

      $waiting = Invoice::where('user_id', Auth::user()->id)
      ->where('status',1)->get();

      $history = Invoice::where('user_id', Auth::user()->id)
      ->whereIn('status',[2,3])->get();

      return view('registrasi.activity.index')
      ->with('pending', $pending)
      ->with('waiting', $waiting)
      ->with('history', $history);

    }

    public function detailActivity($invoiceId){

      $invoice = Invoice::find($invoiceId);

      $invoiceHistory = InvoiceHistory::with('simpanan')->where('invoice_id', $invoiceId)->get();

      // return $invoiceHistory;

      return view('registrasi.activity.detail')
      ->with('invoice', $invoice)
      ->with('invoiceHistory', $invoiceHistory);
    }

    public function checkChangePassword($password){
      //dd($username);
      $currentPwd = Auth::user()->password;

      $validPwd = Auth::attempt(['username' => Auth::user()->username, 'password' => $password],true);

      if($validPwd){
        $msg = "valid";
      }else{
        $msg = "not_valid";
      }

      $data[] = array(
        "status" => $msg
      );

      return json_encode($data);
    }

    public function storeChangePassword(Request $request){

      // dd($request->all());

      $user = User::find(Auth::user()->id);
      $user->password = bcrypt($request->pwdSekarang);
      $user->save();

      $info = "Informasi";
      $colors = "green";
      $icons = "fas fa-check-circle";
      $alert = "Password berhasil di ganti!";

      Session::flash('info', $info);
      Session::flash('alert', $alert);
      Session::flash('colors', $colors);
      Session::flash('icons', $icons);

      return redirect(url('membership/index/akun'));

    }
    public static function quickRandom($length = 16)
    {
      $pool = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

      return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
    }
}
