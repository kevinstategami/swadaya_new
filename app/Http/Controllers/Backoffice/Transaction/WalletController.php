<?php

namespace App\Http\Controllers\Backoffice\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Models\Transaction\Wallet;
Use App\Models\Transaction\WalletHistory;
Use App\Models\Membership\DokumenRepo;
use App\User;
use App\Utils\Query;
use Session;
use DB;

class WalletController extends Controller
{
    public function index(Request $request){
        $data = Query::PagingResponse($request, new Wallet, 'backoffice.transaction.wallet.index', 'wallets');
        return $data;
    }

    public function history(Request $request, $id){
        $data = Query::GetHistoryWallet($request, new WalletHistory, 'user_id', $id, 'wallet_histories');
        return $data;
    }

    public function activateWallet($id){
        $data = Wallet::find($id);
        $data->status_wallet = 1;
        $data->save();
        return json_encode($data);
    }

    public function deactiveWallet($id){
        $data = Wallet::find($id);
        $data->status_wallet = 0;
        $data->save();
        return json_encode($data);
    }

    public function deleteWallet($id){
        $data = Query::DeleteRow('wallets', $id);
        return $data;
    }
}
