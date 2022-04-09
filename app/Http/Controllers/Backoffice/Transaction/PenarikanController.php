<?php

namespace App\Http\Controllers\Backoffice\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Utils\Query;
use App\Models\MasterData\City;
use App\Models\Membership\Member;
use Auth;
use App\User;
use App\Models\MasterData\SimpananType;
use App\Models\MasterData\StaticBank;
use App\Models\MasterData\Bank;
use App\Models\Membership\ReferalCode;
use App\Models\Membership\Simpanan;
use App\Models\Membership\DokumenRepo;
use App\Models\Membership\Downline;
use App\Models\Membership\MembershipBank;
use App\Models\Membership\Penarikan;
use App\Models\Transaction\Invoice;
use App\Models\Transaction\InvoiceHistory;
use App\Models\Transaction\Wallet;
use App\Models\Transaction\WalletHistory;
use Session;
use File;

class PenarikanController extends Controller
{
    public function index(Request $request){
		$data = Query::PagingResponsePenarikan($request, new Penarikan, 'backoffice.transaction.penarikan.index', 'penarikan');
		return $data;
	}

	public function approvedPenarikan($id){
		$data = Penarikan::find($id);
		if($data->status != 1){
			$data->status = 1;
		}
		$data->approved_by = Auth::user()->id;
		$data->save();
		return json_encode($data);
	}

	public function declinePenarikan($id, Request $request){
		$data = Penarikan::find($id);
		if($data->status != 2){
			$data->status = 2;
		}
		$data->save();

		$walletHistory = WalletHistory::where('invoice_id', $id)->delete();
		return json_encode($data);
	}

	public function deletePenarikan($id){
		$penarikan = Penarikan::find($id);
		$penarikan->status = 9999;
		$penarikan->save();
		return $penarikan;
	}
}
