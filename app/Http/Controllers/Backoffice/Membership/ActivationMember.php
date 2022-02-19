<?php

namespace App\Http\Controllers\Backoffice\Membership;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Utils\QueryUser;
use App\Models\Membership\DokumenRepo;
use App\Models\Membership\ReferalCode;
use App\Models\Membership\Downline;
use App\Models\Membership\Member;
Use App\Models\Transaction\Invoice;
Use App\Models\Transaction\Wallet;
Use App\Models\Transaction\WalletHistory;
use App\Models\MasterData\SimpananType;
use App\Models\MasterData\ReferralBonus;
use App\Models\Membership\Simpanan;
use App\User;
use DB;

class ActivationMember extends Controller
{
	public function index(Request $request){
		$data = QueryUser::PagingResponse($request, new User, 'backoffice.membership.activation.index', 'users');
		return $data;
	}

	public function getActivationDetail($id){
		$dokumen = DokumenRepo::where('reff_id', $id)->first();
		return response()->json($dokumen, 200);
	}

	public function activateMember($id){
		$member = Member::where('id',$id)->value('user_id');
		$memberUpdate = Member::find($id);
		$memberUpdate->member_type = 2;
		$memberUpdate->save();
		$user = User::find($member);
		$user->status_aktivasi = 4;
		$user->save();

		$walletUser = Wallet::where('user_id', $member)->first();
		$walletUser->status_wallet = 1;
		$walletUser->save();

		// $invoice = Invoice::where('user_id', $member)->update(
		// 	['status' => 2]
		// );
		// $invoiceData = Invoice::where('user_id', $member)->get();

		// foreach($invoiceData as $key => $value){
		// 	$wallet = Wallet::where('user_id', $value->user_id)->first();
		// 	$walletHistory = new WalletHistory;
		// 	$walletHistory->user_id = $value->user_id;
		// 	$walletHistory->member_no = $value->member_no;
		// 	$walletHistory->email = $value->email;
		// 	$walletHistory->wallet_id = $wallet->id;
		// 	$walletHistory->amount = $value->amount;
		// 	//$walletHistory->description = $value->invoice_type .' '.$value->member_no;
		// 	$walletHistory->description = $value->invoice_type == "PB" ? "Simpanan Bulanan " : "Simpanan 1 Tahun Buku";
		// 	$walletHistory->mutation_type = 'DB'.$value->invoice_type;
		// 	$walletHistory->invoice_id = $value->id;
		// 	$wallet->amount = $wallet->amount + $walletHistory->amount;
		// 	$walletHistory->save();
		// 	$wallet->save();
		// }

		$referal = Downline::where('user_id_downline', $member)->first();
		if($referal){
			$bonusReferal = ReferralBonus::where('sort', 1)->first();
			$wallet = Wallet::where('user_id', $referal->user_id)->first();
			$walletHistory = new WalletHistory;
			$walletHistory->user_id = $referal->user_id;
			$walletHistory->member_no = $referal->member_no;
			$walletHistory->email = $referal->email;
			$walletHistory->wallet_id = $wallet->id;
			$walletHistory->amount = $bonusReferal->value;
			$walletHistory->description = 'Saldo Bonus Referal '.$referal->member_no_downline;
			$walletHistory->mutation_type = 'DBRFBNS';
			$walletHistory->invoice_id = $referal->id;
			$wallet->amount = $wallet->amount + $walletHistory->amount;
			$walletHistory->save();
			$wallet->save();
		}
		return json_encode($member);
	}

	public function declineAnggota($id){
		$member = Member::where('id',$id)->value('user_id');
		$user = User::find($member);
		$user->status_aktivasi = 0;
		$user->save();
		$simpanan = Simpanan::where('user_id',$member)->delete();
		$downline = Downline::where('user_id_downline',$member)->delete();
		$wallet = Wallet::where('user_id',$member)->delete();
		$invoice = Invoice::where('user_id',$member)->delete();
		$referalcode = ReferalCode::where('user_id',$member)->delete();
		$data = QueryUser::DeleteMembership('membership_account', $id);
		return $data;
	}
}
