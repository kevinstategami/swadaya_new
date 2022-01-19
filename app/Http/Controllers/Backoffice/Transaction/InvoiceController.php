<?php

namespace App\Http\Controllers\Backoffice\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Models\Transaction\Invoice;
Use App\Models\Transaction\InvoiceHistory;
Use App\Models\Transaction\Wallet;
Use App\Models\Transaction\WalletHistory;
Use App\Models\Membership\DokumenRepo;
use App\User;
use App\Utils\Query;
use Session;
use DB;

class InvoiceController extends Controller
{
	public function index(Request $request){
		$data = Query::PagingResponse($request, new Invoice, 'backoffice.transaction.invoice.index', 'invoices');
		return $data;
	}

	public function approvedInvoice($id){
		$data = Invoice::find($id);
		$data->status = 2;
		$wallet = Wallet::where('user_id', $data->user_id)->first();
		$walletHistory = new WalletHistory;
		$walletHistory->user_id = $data->user_id;
		$walletHistory->member_no = $data->member_no;
		$walletHistory->email = $data->email;
		$walletHistory->wallet_id = $wallet->id;
		$walletHistory->amount = $data->total_amount;
		$walletHistory->description = $data->invoice_type . ' Saldo';
		$walletHistory->mutation_type = 'DB'.$data->invoice_type;
		$walletHistory->invoice_id = $data->id;
		$wallet->amount = $wallet->amount + $walletHistory->amount;
		$walletHistory->save();
		$wallet->save();
		$data->save();
		return json_encode($data);
	}

	public function declineInvoice($id, Request $request){
		$data = Invoice::find($id);
		$data->description = $request->description;
		$data->status = 3;
		$wallet = Wallet::where('user_id', $data->user_id)->first();
		$walletHistory = new WalletHistory;
		$walletHistory->user_id = $data->user_id;
		$walletHistory->member_no = $data->member_no;
		$walletHistory->email = $data->email;
		$walletHistory->wallet_id = $wallet->id;
		$walletHistory->amount = $data->total_amount;
		$walletHistory->description = $data->invoice_type . ' Saldo';
		$walletHistory->mutation_type = 'CR'.$data->invoice_type;
		$walletHistory->invoice_id = $data->id;
		$wallet->amount = $wallet->amount - $walletHistory->amount;
		$walletHistory->save();
		$wallet->save();
		$data->save();

		$walletHistory = WalletHistory::where('invoice_id', $id)->delete();
		return json_encode($data);
	}

	public function deleteInvoice($id){
		$invoice = Invoice::find($id);
		$wallet = Wallet::where('user_id', $invoice->user_id)->first();
		$wallet->amount = $wallet->amount - $invoice->amount;
		$wallet->save();
        $data = Query::DeleteRow('invoices', $id);
        $walletHistory = WalletHistory::where('invoice_id', $id)->delete();
        return $data;
    }

    public function getImage($id){
		$dokumen = DokumenRepo::where('reff_id', $id)->first();
		return response()->json($dokumen, 200);
	}
}
