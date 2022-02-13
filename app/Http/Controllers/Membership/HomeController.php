<?php

namespace App\Http\Controllers\Membership;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Utils\Query;
use App\Models\MasterData\City;
use App\Models\Membership\Member;
use Auth;
use App\User;
use App\Models\MasterData\SimpananType;
use App\Models\Membership\ReferalCode;
use App\Models\Membership\Simpanan;
use App\Models\Membership\DocumenRepo;
use App\Models\Transaction\Invoice;
use App\Models\Transaction\InvoiceHistory;
use Session;
use App\Models\Transaction\Wallet;
use App\Models\Transaction\WalletHistory;


class HomeController extends Controller
{
    public function indexAkun(){

      $member = Member::where('user_id', Auth::user()->id)->first();
      if($member != null){
        $referalCode = $member->member_no;
      }else{
        $referalCode = '';
      }
      return view('registrasi.akun.index')
      ->with('referalCode', $referalCode);
    }
    public function historyWallet(){

      $history = WalletHistory::with('invoice')->where('user_id', Auth::user()->id)->get();

      return view('registrasi.home.history.index')
      ->with('history', $history);

    }
    public function index(){

      // $invoiceFirstCheck = Invoice::with('simpananType')->where('user_id', Auth::user()->id)->where('status', 2)
      // ->whereIn('invoice_type',['SW','SP','SS'])->sum('total_amount');

      $invoiceCheck = Invoice::with('simpananType')->whereIn('invoice_type',['SW','SP','SS'])->where('user_id', Auth::user()->id)->where('status', 2)->sum('total_amount');
      $invoiceUpdated = Invoice::with('simpananType')->whereIn('invoice_type',['SW','SP','SS'])->where('user_id', Auth::user()->id)->where('status', 2)->orderby('id','desc')->value('updated_at');

      $walletBnsTersedia = WalletHistory::where('mutation_type','DBRFBNS')->where('user_id', Auth::user()->id)->sum('amount');
      $walletBnsTersediaUpdated = WalletHistory::where('mutation_type','DBRFBNS')->where('user_id', Auth::user()->id)->orderby('id','desc')->value('updated_at');

      $walletBnsSudahDitarik = WalletHistory::where('mutation_type','CRRFBNS')->where('user_id', Auth::user()->id)->sum('amount');
      $walletBnsSudahDitarikUpdated = WalletHistory::where('mutation_type','CRRFBNS')->where('user_id', Auth::user()->id)->orderby('id','desc')->value('updated_at');

      $bnsTersedia = $walletBnsTersedia - $walletBnsSudahDitarik;

      return view('registrasi.home.index')
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

      if($bnsTersedia == 0){

        $alert = "Saldo Bonus tidak tersedia";
        $info = "error";
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
        return view('registrasi.home.wallet.tarik');
      }

    }
    public function activity(){

      $pending = Invoice::where('user_id', Auth::user()->id)
      ->where('status',0)->get();

      $waiting = Invoice::where('user_id', Auth::user()->id)
      ->where('status',1)->get();

      $history = Invoice::where('user_id', Auth::user()->id)
      ->where('status',2)->get();

      return view('registrasi.activity.index')
      ->with('pending', $pending)
      ->with('waiting', $waiting)
      ->with('history', $history);

    }

    public function detailActivity($invoiceId){

      $invoice = Invoice::find($invoiceId);

      $invoiceHistory = InvoiceHistory::where('invoice_id', $invoiceId)->get();

      return view('registrasi.activity.detail')
      ->with('invoice', $invoice)
      ->with('invoiceHistory', $invoiceHistory);
    }

}
