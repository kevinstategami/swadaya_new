<?php

namespace App\Http\Controllers\Backoffice\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Models\Transaction\InvoiceHistory;
Use App\Models\Membership\DokumenRepo;
use App\User;
use App\Utils\Query;
use Session;
use DB;

class InvoiceHistoryController extends Controller
{
    public function index(Request $request){
        $data = Query::PagingResponse($request, new InvoiceHistory, 'backoffice.transaction.invoice-history.index', 'invoice_histories');
        return $data;
    }

    public function approvedInvoice($id){
        $data = InvoiceHistory::find($id);
        $data->status = 2;
        $data->save();
        return json_encode($data);
    }

    public function declineInvoice($id){
        $data = InvoiceHistory::find($id);
        $data->status = 3;
        $data->save();
        return json_encode($data);
    }

    public function deleteInvoice($id){
        $data = Query::DeleteRow('invoice_histories', $id);
        return $data;
    }

    public function getImage($id){
        $dokumen = DokumenRepo::where('reff_id', $id)->first();
        return response()->json($dokumen, 200);
    }
}
