<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use App\Models\Membership\Member;
use App\Models\Transaction\Invoice;
use App\Models\Transaction\InvoiceHistory;
use App\Models\MasterData\SimpananType;
use App\Models\Membership\Simpanan;

class GenerateTagihan extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tagihan:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command For Generate Invoices';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        date_default_timezone_set('Asia/Jakarta');
        $sp = SimpananType::where('type_code','SP')->first();
        $sw = SimpananType::where('type_code','SW')->first();
        $ss = SimpananType::where('type_code','SS')->first();
        $invCount = Invoice::count() + 1;

        $countGenerate = 0;

        $date = date('Y-m-d\TH:i:s');
        $datas = Member::join('users', 'users.id', '=', 'membership_account.user_id')->where('users.status_aktivasi', 4)->select('membership_account.*')->get();
        foreach ($datas as $data) {
            $tagihan = Invoice::where('user_id', $data->user_id)->where('member_no', $data->member_no)->whereIn('invoice_type', ['PB', 'SMT'])->latest()->first();
            $data->tagihan = $tagihan;
            if ($tagihan) {
                if ($tagihan->invoice_type == "SMT") {
                    $nextTagihan = $tagihan->updated_at->addYear(1);
                } else if ($tagihan->invoice_type == "PB") {
                    $nextTagihan = $tagihan->updated_at->addMonth(1);
                }
                $generateTagihan = $date >= $nextTagihan;
                if ($generateTagihan) {
                    if ($tagihan->invoice_type == "SMT") {
                        $invoice = new Invoice();
                        $invoice->user_id = $data->user_id;
                        $invoice->member_no = $data->member_no;
                        $invoice->email = $data->email;
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

                        $currentMonth = date('m');

                        for ($i=$currentMonth; $i <= 12; $i++) {

                            $countSimpananWajib = Simpanan::where('simpanan_type_id', $sw->id)->count();

                            $simpananWajib = new Simpanan();
                            $simpananWajib->user_id = $data->user_id;
                            $simpananWajib->member_no = $data->member_no;
                            $simpananWajib->email = $data->email;
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
                            $invoiceHistoryWajib->user_id = $data->user_id;
                            $invoiceHistoryWajib->member_no = $data->member_no;
                            $invoiceHistoryWajib->email = $data->email;
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

                        $countGenerate += 1;

                    } else if ($tagihan->invoice_type == "PB") {
                        $invoice = new Invoice();
                        $invoice->user_id = $data->user_id;
                        $invoice->member_no = $data->member_no;
                        $invoice->email = $data->email;
                        $invoice->invoice_code = "SGG-".date('Ymd').sprintf("%'04d", $invCount);
                        $invoice->amount = $sw->deposit_min;
                        $invoice->admin_fee = 0;
                        $invoice->additional_amount = 0;
                        $invoice->total_amount = $sw->deposit_min;
                        $invoice->payment_method_id = null;
                        $invoice->invoice_type = "PB";
                        $invoice->invoice_type_id = "PB";
                        $invoice->status = 0;
                        $invoice->payment_method_id = 1;
                        $invoice->created_at = date('Y-m-d').date(' h:i:s');
                        $invoice->save();
       
                        $countSimpananWajib = Simpanan::where('simpanan_type_id', $sw->id)->count();

                        $simpananWajib = new Simpanan();
                        $simpananWajib->user_id = $data->user_id;
                        $simpananWajib->member_no = $data->member_no;
                        $simpananWajib->email = $data->email;
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
                        $invoiceHistoryWajib->user_id = $data->user_id;
                        $invoiceHistoryWajib->member_no = $data->member_no;
                        $invoiceHistoryWajib->email = $data->email;
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

                        $countGenerate += 1;
                    }
                }
                $tagihan->next = $nextTagihan;
                $tagihan->generateTagihan = $generateTagihan;
            }
        }
        $message = "Berhasil Tergenerate sejumlah = " . $countGenerate . " tagihan!";
        $this->info($message);
        return 0;
    }
}
