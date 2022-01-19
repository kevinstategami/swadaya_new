<?php
namespace App\Utils;

use App\Helper\Constant;
use DB;
use Session;
Use Redirect;
use App\Models\Membership\DokumenRepo;
use App\Models\Membership\Downline;
use App\Models\Membership\Member;
Use App\Models\Transaction\Invoice;
Use App\Models\Transaction\InvoiceHistory;
use App\Models\MasterData\SimpananType;
use App\Models\Membership\Simpanan;

class InvoiceReccurence {
	public static function GenerateInvoice(){
		$checkInvoice = Invoice::where(function ($query) {
			$dateTo = date('Y-m-d');
			$dateFrom = date('Y-m-d', strtotime("-1 months"));
			$query->where('created_at', '<', $dateTo)->where('created_at', '>', $dateFrom)->where('invoice_type','SW');
		})->get();
		foreach ($checkInvoice as $value) {
			$sw = SimpananType::where('type_code','SW')->first();
			$invoice = new Invoice();
			$invoice->user_id = $value->user_id;
			$invoice->member_no = $value->member_no;
			$invoice->email = $value->email;
			$invoice->invoice_code = Invoice::count() + 1;
			$invoice->amount = $sw->deposit_min;
			$invoice->admin_fee = 0;
			$invoice->additional_amount = 0;
			$invoice->total_amount = $sw->deposit_min;
			$invoice->payment_method_id = null;
			$invoice->target_bank_id = null;
			$invoice->target_bank_name = "BNI";
			$invoice->target_bank_account_no = "0485013675";
			$invoice->target_bank_account_name = "Dwiky Aliansyah";
			$invoice->invoice_type = "SW";
			$invoice->invoice_type_id = $sw->id;
			$invoice->status = 0;
			$invoice->payment_method_id = 1;
			$invoice->save();

			$invoiceHistory = new InvoiceHistory();
			$invoiceHistory->user_id = $invoice->user_id;
			$invoiceHistory->member_no = $invoice->member_no;
			$invoiceHistory->email = $invoice->email;
			$invoiceHistory->invoice_code = $invoice->invoice_code;
			$invoiceHistory->amount = $invoice->amount;
			$invoiceHistory->admin_fee = $invoice->admin_fee;
			$invoiceHistory->additional_amount = $invoice->additional_amount;
			$invoiceHistory->total_amount = $invoice->amount;
			$invoiceHistory->payment_method_id = $invoice->payment_method_id;
			$invoiceHistory->target_bank_id = $invoice->target_bank_id;
			$invoiceHistory->target_bank_name = $invoice->target_bank_name;
			$invoiceHistory->target_bank_account_no = $invoice->target_bank_account_no;
			$invoiceHistory->target_bank_account_name = $invoice->target_bank_account_name;
			$invoiceHistory->invoice_type = $invoice->invoice_type;
			$invoiceHistory->invoice_type_id = $invoice->invoice_type_id;
			$invoiceHistory->status = $invoice->status;
			$invoiceHistory->payment_method_id = $invoice->payment_method_id;
			$invoiceHistory->save();

			$countSimpanan = Simpanan::where('simpanan_type_id', $sw->id)->count();
			$simpanan = new Simpanan();
			$simpanan->user_id = $value->user_id;
			$simpanan->member_no = $value->member_no;
			$simpanan->email = $value->email;
			$simpanan->invoice_id = $invoice->id;
			$simpanan->simpanan_no = "SW".sprintf("%'06d", $countSimpanan + 1);
			$simpanan->amount = $sw->deposit_min;
			$simpanan->admin_fee = 0;
			$simpanan->total = $sw->deposit_min;
			$simpanan->simpanan_type_id = $sw->id;
			$simpanan->deposit_date = date('Y-m-d');
			$simpanan->save();
		}
	}

}
