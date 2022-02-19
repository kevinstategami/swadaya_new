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
use App\Models\MasterData\Bank;
use App\Models\Membership\ReferalCode;
use App\Models\Membership\Simpanan;
use App\Models\Membership\DokumenRepo;
use App\Models\Membership\Downline;
use App\Models\Transaction\Invoice;
use App\Models\Transaction\InvoiceHistory;
use App\Models\Transaction\Wallet;
use App\Models\Transaction\WalletHistory;
use Session;
use File;

class RegistrasiController extends Controller
{
  public function tarikSaldo(Request $request){

    $walletBnsTersedia = WalletHistory::where('mutation_type','DBRFBNS')->where('user_id', Auth::user()->id)->sum('amount');
    $walletBnsSudahDitarik = WalletHistory::where('mutation_type','CRRFBNS')->where('user_id', Auth::user()->id)->sum('amount');

    $bnsTersedia = $walletBnsTersedia - $walletBnsSudahDitarik;

    if($request->jmlPenarikan > $bnsTersedia){

      $alert = "Jumlah penarikan tidak boleh lebih dari ".number_format($bnsTersedia, 0, '.', '.');
      $info = "error";
      $colors = "red";
      $icons = "fas fa-ban";
      return redirect(url('membership/index/tarik-saldo'))
      ->with('info', $info)
      ->with('alert', $alert)
      ->with('colors', $colors)
      ->with('icons', $icons);

    }

    $member = Member::where('user_id', Auth::user()->id)->first();
    $sw = SimpananType::where('type_code','SW')->first();
    $invCount = Invoice::count() + 1;

    $invoice = new Invoice();
    $invoice->user_id = $member->user_id;
    $invoice->member_no = $member->member_no;
    $invoice->email = $member->email;
    $invoice->invoice_code = "SWD-INVCRRFBNS-".date('Ymd').sprintf("%'04d", $invCount);
    $invoice->amount = $request->jmlPenarikan;
    $invoice->admin_fee = 0;
    $invoice->additional_amount = 0;
    $invoice->total_amount = $request->jmlPenarikan;
    $invoice->payment_method_id = null;
    $invoice->invoice_type = "CRRFBNS";
    $invoice->invoice_type_id = $sw->id;
    $invoice->status = 2;
    $invoice->payment_method_id = 1;
    $invoice->created_at = date('Y-m-d').date(' h:i:s');
    $invoice->save();

    $invoiceHistory = new InvoiceHistory();
    $invoiceHistory->user_id = $member->user_id;
    $invoiceHistory->member_no = $member->member_no;
    $invoiceHistory->email = $member->email;
    $invoiceHistory->invoice_code = $invoice->invoice_code;
    $invoiceHistory->amount = $request->jmlPenarikan;
    $invoiceHistory->admin_fee = 0;
    $invoiceHistory->additional_amount = 0;
    $invoiceHistory->total_amount = $request->jmlPenarikan;
    $invoiceHistory->payment_method_id = '1';
    $invoiceHistory->invoice_type = "CRRFBNS";
    $invoiceHistory->invoice_type_id = $sw->id;
    $invoiceHistory->status = 2;
    $invoiceHistory->created_at = date('Y-m-d').date(' h:i:s');
    $invoiceHistory->save();

    $alert = "Tim kami akan memproses pengajuan anda";
    $info = "Pengajuan Berhasil";
    $colors = "green";
    $icons = "fas fa-check-circle";
    return redirect(url('membership/index/home'))
    ->with('info', $info)
    ->with('alert', $alert)
    ->with('colors', $colors)
    ->with('icons', $icons);

  }
  public function uploadBukti($tagihanId){

    $user = Query::ObjectResponse('users', 'id', Auth::user()->id);
    $simpananType = Query::ObjectResponse('simpanan_types', 'type_code', 'SW');
    $bank = Bank::all();
    //dd($bank);
    return view('registrasi.home.aktivasi.uploadBukti')
    ->with('user', $user['object'])
    ->with('tagihanId', $tagihanId)
    ->with('simpananType', $simpananType['object'])
    ->with('bank', $bank);
  }
  public function storeBukti(Request $request){
    // dd($request->all());
    if($request->file('imgBukti')){
      $file = $request->file('imgBukti');
      if($file->getClientOriginalExtension()=="png"
        || $file->getClientOriginalExtension()=="jpg"
        || $file->getClientOriginalExtension()=="PNG"
        || $file->getClientOriginalExtension()=="JPG"
      ) {

      $member = Member::where('user_id', $request->userId)->first();
      $destinationPath = "simpanan-wajib/".$member->member_no.'-'.$this->quickRandom(4).'-'.date('Y-m-d');
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

     $bank = Bank::find($request->bankPenerima);

     $invoice = Invoice::where('id', $request->tagihanId)->first();
     $invoice->target_bank_id = $bank->id;
     $invoice->target_bank_name = $bank->bank_code;
     $invoice->target_bank_account_name = $bank->account_name;
     $invoice->target_bank_account_no = $bank->account_number;
     $invoice->status = 1;

     $invoice->save();


     $doc = new DokumenRepo();
     $doc->reff_id = $invoice->id;
     $doc->reff_type = $invoice->invoice_type;
     $doc->filename = $fileName;
     $doc->mime_type = $fileExt;
     $doc->path = $img;
     $doc->save();

     $alert = "Bukti telah tersimpan, harap menunggu untuk pengecekan dari kami";
     $info = "Informasi";
     $colors = "green";
     $icons = "fas fa-check-circle";
     return redirect(url('membership/index/home'))
     ->with('info', $info)
     ->with('alert', $alert)
     ->with('colors', $colors)
     ->with('icons', $icons);

   }else{
    $alert = "Harap memasukan jenis file yang sesuai";
    $info = "error";
    $colors = "red";
    $icons = "fas fa-ban";
    return redirect(url('membership/index/uploadBukti/'.Auth::user()->id))
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
  return redirect(url('membership/index/uploadBukti/'.Auth::user()->id))
  ->with('info', $info)
  ->with('alert', $alert)
  ->with('colors', $colors)
  ->with('icons', $icons);
}
}
public function formAktivasi($userId){

    $cekUser = Auth::user()->status_aktivasi;

    if($cekUser == 2){
      $info = "Informasi";
      $colors = "red";
      $icons = "fas fa-ban";
      $alert = "Akun anda sedang menunggu diverifikasi!";

      Session::flash('info', $info);
      Session::flash('alert', $alert);
      Session::flash('colors', $colors);
      Session::flash('icons', $icons);

        return redirect(url('membership/index/home'));
    }

    $checkMember = Member::where('user_id', $userId)->count();

    if($checkMember > 0){

      $info = "Informasi";
      $colors = "red";
      $icons = "fas fa-ban";
      $alert = "Akun anda sudah aktif!";

      Session::flash('info', $info);
      Session::flash('alert', $alert);
      Session::flash('colors', $colors);
      Session::flash('icons', $icons);

      return redirect(url('membership/index/home'));
    }


    $user = Query::ObjectResponse('users', 'id', $userId);
    $simpananPokok = Query::ObjectResponse('simpanan_types', 'type_code', 'SP');
    $simpananWajib = Query::ObjectResponse('simpanan_types', 'type_code', 'SW');
    $kota = City::all();
    // dd($simpananType);
  return view('registrasi.home.aktivasi.form_aktivasi')
  ->with('user', $user['object'])
  ->with('city', $kota)
  ->with('simpananPokok', $simpananPokok['object'])
  ->with('simpananWajib', $simpananWajib['object']);
}

  public function storeAktivasi(Request $req){

    date_default_timezone_set('Asia/Jakarta');

    // dd(date('Y-').sprintf("%'02d", '1').date('-d').date(' h:i:s'));
    // dd($req->all());
    $user = User::find($req->userId);
    $countMember = Member::where('member_type', '1')->count() + 1;
    $kota = City::find($req->kota);
    $sp = SimpananType::where('type_code','SP')->first();
    $sw = SimpananType::where('type_code','SW')->first();
    $ss = SimpananType::where('type_code','SS')->first();
    $invCount = Invoice::count() + 1;
    // dd('AB'.sprintf("%'03d", $countMember).$this->quickRandom(4));

    $checkMember = Member::where('user_id', $req->userId)->count();

    if($checkMember > 0){

      $info = "Informasi";
      $colors = "red";
      $icons = "fas fa-ban";
      $alert = "Akun anda sudah aktif!";

      Session::flash('info', $info);
      Session::flash('alert', $alert);
      Session::flash('colors', $colors);
      Session::flash('icons', $icons);

      return redirect(url('membership/index/home'));
    }

    $member = new Member();
    $member->member_type = 1; //1 AB anggota biasa, 2 ALB anggota luar biasa
    $member->member_no = 'AB'.sprintf("%'04d", $countMember).$this->quickRandom(4);
    $member->fullname = $user->name;
    $member->user_id = $req->userId;
    $member->email = $user->email;
    $member->identity_no = $req->noKtp;
    $member->phone_no = $req->telepon;
    $member->gender = $req->jenisKelamin;
    $member->birth_place = $req->tempatLahir;
    $member->birth_date = $req->ttl;
    $member->city_id = $req->kota;
    $member->province_id = $kota->idProv;
    $member->postal_code = $req->kodePos;
    $member->address = $req->alamat;
    $member->member_since = date('Y-m-d');
    $member->description = "Pendaftaran Akun Member a/n ".$user->name." pada tanggal ".date('Y-m-d')." dengan status masih dalam peninjauan verifikasi";
    $member->save();

    // $referalCode = new ReferalCode();
    // $referalCode->member_no = $member->member_no;
    // $referalCode->user_id = $req->userId;
    // $referalCode->email = $member->email;
    // $referalCode->code = 'SW'.$this->quickRandom(4);
    // $referalCode->status = 1;
    // $referalCode->save();

    $userDataReferal = ReferalCode::where('user_id', $user->id)->first();
    if($userDataReferal){
      $memberReferal = Member::where('member_no', $userDataReferal->member_no)->first();
      if($memberReferal){
        $downline = new Downline();
        $downline->user_id = $memberReferal->user_id;
        $downline->user_id_downline = $user->id;
        $downline->member_no = $memberReferal->member_no;
        $downline->member_no_downline = $member->member_no;
        $downline->email = $memberReferal->email;
        $downline->email_downline = $user->email;
        $downline->referal_code_id = $userDataReferal->id;
        $downline->referal_code = $userDataReferal->code;
        $downline->save();
      }
    }


    $wallet = new Wallet();
    $wallet->user_id = $member->user_id;
    $wallet->member_no = $member->member_no ;
    $wallet->email = $member->email;
    $wallet->amount = 0;
    $wallet->status_wallet = 0;
    $wallet->save();


    // LOOP SW
    if($req->jenisSimpanan == "PB"){

      $invoice = new Invoice();
      $invoice->user_id = $member->user_id;
      $invoice->member_no = $member->member_no;
      $invoice->email = $member->email;
      $invoice->invoice_code = "SGG-".date('Ymd').sprintf("%'04d", $invCount);
      $invoice->amount = $sw->deposit_min + $sp->deposit_min;
      $invoice->admin_fee = 0;
      $invoice->additional_amount = 0;
      $invoice->total_amount = $sw->deposit_min + $sp->deposit_min;
      $invoice->payment_method_id = null;
      $invoice->invoice_type = "PB";
      $invoice->invoice_type_id = "PB";
      $invoice->status = 0;
      $invoice->payment_method_id = 1;
      $invoice->created_at = date('Y-m-d').date(' h:i:s');
      $invoice->save();
      //pokok
      $countSimpananPokok = Simpanan::where('simpanan_type_id', $sp->id)->count();

      $simpananPokok = new Simpanan();
      $simpananPokok->user_id = $member->user_id;
      $simpananPokok->member_no = $member->member_no;
      $simpananPokok->email = $member->email;
      $simpananPokok->invoice_id = $invoice->id;
      $simpananPokok->simpanan_no = "SP".sprintf("%'06d", $countSimpananPokok + 1);
      $simpananPokok->amount = $sp->deposit_min;
      $simpananPokok->admin_fee = 0;
      $simpananPokok->total = $sp->deposit_min;
      $simpananPokok->simpanan_type_id = $sp->id;
      $simpananPokok->deposit_date = date('Y-m-d');
      $simpananPokok->created_at = date('Y-m-d').date(' h:i:s');
      $simpananPokok->save();

      $countHistory = InvoiceHistory::count();

      $invoiceHistoryPokok = new InvoiceHistory();
      $invoiceHistoryPokok->invoice_id = $invoice->id;
      $invoiceHistoryPokok->user_id = $member->user_id;
      $invoiceHistoryPokok->member_no = $member->member_no;
      $invoiceHistoryPokok->email = $member->email;
      $invoiceHistoryPokok->invoice_code = "SP-SGG".sprintf("%'06d", $countHistory + 1);
      $invoiceHistoryPokok->amount = $sp->deposit_min;
      $invoiceHistoryPokok->admin_fee = 0;
      $invoiceHistoryPokok->additional_amount = 0;
      $invoiceHistoryPokok->total_amount = $sp->deposit_min;
      $invoiceHistoryPokok->payment_method_id = '1';
      $invoiceHistoryPokok->invoice_type = 'SP';
      $invoiceHistoryPokok->invoice_type_id = $sp->id;
      $invoiceHistoryPokok->status = 0;
      $invoiceHistoryPokok->created_at = date('Y-m-d').date(' h:i:s');
      $invoiceHistoryPokok->save();
      // dd("saving pokok");
      //wajib
      $countSimpananWajib = Simpanan::where('simpanan_type_id', $sw->id)->count();

      $simpananWajib = new Simpanan();
      $simpananWajib->user_id = $member->user_id;
      $simpananWajib->member_no = $member->member_no;
      $simpananWajib->email = $member->email;
      $simpananWajib->invoice_id = $invoice->id;
      $simpananWajib->simpanan_no = "SW".sprintf("%'06d", $countSimpananWajib + 1);
      $simpananWajib->amount = $sw->deposit_min;
      $simpananWajib->admin_fee = 0;
      $simpananWajib->total = $sw->deposit_min;
      $simpananWajib->simpanan_type_id = $sw->id;
      $simpananWajib->deposit_date = date('Y-m-d');
      $simpananWajib->created_at = date('Y-m-d').date(' h:i:s');
      $simpananWajib->save();

      $countHistoryWjb = InvoiceHistory::count();

      $invoiceHistoryWajib = new InvoiceHistory();
      $invoiceHistoryWajib->invoice_id = $invoice->id;
      $invoiceHistoryWajib->user_id = $member->user_id;
      $invoiceHistoryWajib->member_no = $member->member_no;
      $invoiceHistoryWajib->email = $member->email;
      $invoiceHistoryWajib->invoice_code = "SW-SGG".sprintf("%'06d", $countHistoryWjb + 1);
      $invoiceHistoryWajib->amount = $sw->deposit_min;
      $invoiceHistoryWajib->admin_fee = 0;
      $invoiceHistoryWajib->additional_amount = 0;
      $invoiceHistoryWajib->total_amount = $sw->deposit_min;
      $invoiceHistoryWajib->payment_method_id = '1';
      $invoiceHistoryWajib->invoice_type = 'SW';
      $invoiceHistoryWajib->invoice_type_id = $sw->id;
      $invoiceHistoryWajib->status = 0;
      $invoiceHistoryWajib->created_at = date('Y-m-d').date(' h:i:s');
      $invoiceHistoryWajib->save();

    } else if($req->jenisSimpanan == "SK"){
      // for ($i=$req->pilih1; $i <= $req->pilih2; $i++) {
      //
      //   $invoice = new Invoice();
      //   $invoice->user_id = $member->user_id;
      //   $invoice->member_no = $member->member_no;
      //   $invoice->email = $member->email;
      //   $invoice->invoice_code = "SWD-INVSW-".date('Ymd').sprintf("%'04d", $invCount);
      //   $invoice->amount = $sw->deposit_min;
      //   $invoice->admin_fee = 0;
      //   $invoice->additional_amount = 0;
      //   $invoice->total_amount = $sw->deposit_min;
      //   $invoice->payment_method_id = '1';
      //   $invoice->invoice_type = "SW";
      //   $invoice->invoice_type_id = $sw->id;
      //   $invoice->status = 0;
      //   $invoice->created_at = date('Y-').sprintf("%'02d", $i).date('-d').date(' h:i:s');
      //   $invoice->save();
      //
      //   $countSimpananWajib = Simpanan::where('simpanan_type_id', $sw->id)->count();
      //
      //   $simpananWajib = new Simpanan();
      //   $simpananWajib->user_id = $member->user_id;
      //   $simpananWajib->member_no = $member->member_no;
      //   $simpananWajib->email = $member->email;
      //   $simpananWajib->invoice_id = $invoice->id;
      //   $simpananWajib->simpanan_no = "SW".sprintf("%'06d", $countSimpananWajib + 1);
      //   $simpananWajib->amount = $sw->deposit_min;
      //   $simpananWajib->admin_fee = 0;
      //   $simpananWajib->total = $sw->deposit_min;
      //   $simpananWajib->simpanan_type_id = $sw->id;
      //   $simpananWajib->deposit_date = date('Y-m-d');
      //   $simpananWajib->created_at = date('Y-').sprintf("%'02d", $i).date('-d').date(' h:i:s');
      //   $simpananWajib->save();
      //
      //   $invoiceHistoryWajib = new InvoiceHistory();
      //   $invoiceHistoryWajib->user_id = $member->user_id;
      //   $invoiceHistoryWajib->member_no = $member->member_no;
      //   $invoiceHistoryWajib->email = $member->email;
      //   $invoiceHistoryWajib->invoice_code = $invoice->invoice_code;
      //   $invoiceHistoryWajib->amount = $sw->deposit_min;
      //   $invoiceHistoryWajib->admin_fee = 0;
      //   $invoiceHistoryWajib->additional_amount = 0;
      //   $invoiceHistoryWajib->total_amount = $sw->deposit_min;
      //   $invoiceHistoryWajib->payment_method_id = '1';
      //   $invoiceHistoryWajib->invoice_type = 'SW';
      //   $invoiceHistoryWajib->invoice_type_id = $sw->id;
      //   $invoiceHistoryWajib->status = 0;
      //   $invoiceHistoryWajib->created_at = date('Y-').sprintf("%'02d", $i).date('-d').date(' h:i:s');
      //   $invoiceHistoryWajib->save();
      // }
    } else{

      $invoice = new Invoice();
      $invoice->user_id = $member->user_id;
      $invoice->member_no = $member->member_no;
      $invoice->email = $member->email;
      $invoice->invoice_code = "SGG-".date('Ymd').sprintf("%'04d", $invCount);
      $invoice->amount = 0;
      $invoice->admin_fee = 0;
      $invoice->additional_amount = 0;
      $invoice->total_amount = 0;
      $invoice->payment_method_id = null;
      $invoice->invoice_type = "SMT";
      $invoice->invoice_type_id = "SMT";
      $invoice->status = 0;
      $invoice->payment_method_id = 1;
      $invoice->created_at = date('Y-m-d').date(' h:i:s');
      $invoice->save();

      $countSimpananPokok = Simpanan::where('simpanan_type_id', $sp->id)->count();

      $simpananPokok = new Simpanan();
      $simpananPokok->user_id = $member->user_id;
      $simpananPokok->member_no = $member->member_no;
      $simpananPokok->email = $member->email;
      $simpananPokok->invoice_id = $invoice->id;
      $simpananPokok->simpanan_no = "SP".sprintf("%'06d", $countSimpananPokok + 1);
      $simpananPokok->amount = $sp->deposit_min;
      $simpananPokok->admin_fee = 0;
      $simpananPokok->total = $sp->deposit_min;
      $simpananPokok->simpanan_type_id = $sp->id;
      $simpananPokok->deposit_date = date('Y-m-d');
      $simpananPokok->created_at = date('Y-m-d').date(' h:i:s');
      $simpananPokok->save();

      $countHistory = InvoiceHistory::count();

      $invoiceHistoryPokok = new InvoiceHistory();
      $invoiceHistoryPokok->invoice_id = $invoice->id;
      $invoiceHistoryPokok->user_id = $member->user_id;
      $invoiceHistoryPokok->member_no = $member->member_no;
      $invoiceHistoryPokok->email = $member->email;
      $invoiceHistoryPokok->invoice_code = "SP-SGG".sprintf("%'06d", $countHistory + 1);
      $invoiceHistoryPokok->amount = $sp->deposit_min;
      $invoiceHistoryPokok->admin_fee = 0;
      $invoiceHistoryPokok->additional_amount = 0;
      $invoiceHistoryPokok->total_amount = $sp->deposit_min;
      $invoiceHistoryPokok->payment_method_id = '1';
      $invoiceHistoryPokok->invoice_type = 'SP';
      $invoiceHistoryPokok->invoice_type_id = $sp->id;
      $invoiceHistoryPokok->status = 0;
      $invoiceHistoryPokok->created_at = date('Y-m-d').date(' h:i:s');
      $invoiceHistoryPokok->save();

      $currentMonth = date('m');
      for ($i=$currentMonth; $i <= 12; $i++) {

        $countSimpananWajib = Simpanan::where('simpanan_type_id', $sw->id)->count();

        $simpananWajib = new Simpanan();
        $simpananWajib->user_id = $member->user_id;
        $simpananWajib->member_no = $member->member_no;
        $simpananWajib->email = $member->email;
        $simpananWajib->invoice_id = $invoice->id;
        $simpananWajib->simpanan_no = "SW".sprintf("%'06d", $countSimpananWajib + 1);
        $simpananWajib->amount = $sw->deposit_min;
        $simpananWajib->admin_fee = 0;
        $simpananWajib->total = $sw->deposit_min;
        $simpananWajib->simpanan_type_id = $sw->id;
        $simpananWajib->deposit_date = date('Y-m-d');
        $simpananWajib->created_at = date('Y-').sprintf("%'02d", $i).date('-d').date(' h:i:s');
        $simpananWajib->save();

        $countHistoryWjb = InvoiceHistory::count();

        $invoiceHistoryWajib = new InvoiceHistory();
        $invoiceHistoryWajib->invoice_id = $invoice->id;
        $invoiceHistoryWajib->user_id = $member->user_id;
        $invoiceHistoryWajib->member_no = $member->member_no;
        $invoiceHistoryWajib->email = $member->email;
        $invoiceHistoryWajib->invoice_code = "SW-SGG".sprintf("%'06d", $countHistoryWjb + 1);
        $invoiceHistoryWajib->amount = $sw->deposit_min;
        $invoiceHistoryWajib->admin_fee = 0;
        $invoiceHistoryWajib->additional_amount = 0;
        $invoiceHistoryWajib->total_amount = $sw->deposit_min;
        $invoiceHistoryWajib->payment_method_id = '1';
        $invoiceHistoryWajib->invoice_type = 'SW';
        $invoiceHistoryWajib->invoice_type_id = $sw->id;
        $invoiceHistoryWajib->status = 0;
        $invoiceHistoryWajib->created_at = date('Y-').sprintf("%'02d", $i).date('-d').date(' h:i:s');
        $invoiceHistoryWajib->save();
      }

      $sumNominal = InvoiceHistory::where('invoice_id', $invoice->id)->sum('amount');
      $changeNominal = Invoice::find($invoice->id);
      $changeNominal->amount = $sumNominal;
      $changeNominal->total_amount = $sumNominal;
      $changeNominal->save();

    }


    $user->status_aktivasi = 2;
    $user->save();

    $alert = "Silakan melakukan pembayaran terhadap tagihan anda!";
    $info = "Aktivasi Akun Berhasil";
    $colors = "green";
    $icons = "fas fa-check-circle";


    return redirect(url('membership/index/home'))
    ->with('info', $info)
    ->with('alert', $alert)
    ->with('colors', $colors)
    ->with('icons', $icons);
  }

  public static function quickRandom($length = 16)
  {
    $pool = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

    return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
  }
}
