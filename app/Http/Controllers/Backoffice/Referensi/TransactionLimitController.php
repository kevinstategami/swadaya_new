<?php

namespace App\Http\Controllers\Backoffice\Referensi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterData\MembershipTransactionLimit;
use App\Utils\Query;
use App\Models\Membership\Member;
use Session;

class TransactionLimitController extends Controller
{
    public function index(Request $request){
        $data = Query::PagingResponse($request, new MembershipTransactionLimit, 'backoffice.referensi.limit-transaksi.index', 'membership_transaction_limits');
        return $data;
    }

    public function create(){
    	$data = Member::all();
    	return view('backoffice.referensi.limit-transaksi.create')
    	->with('membership', $data);
    }

    public function edit($id){
    	$membership = Member::all();
    	$value = MembershipTransactionLimit::find($id);

    	return view('backoffice.referensi.limit-transaksi.edit')
    	->with('membership', $membership)
    	->with('value', $value);
    }

    public function store(Request $request){
    	$member = Member::find($request->member_id);
    	$limit = array(
    		'user_id' => $member->user_id, 
    		'member_no' => $member->member_no,
    		'email' => $member->email,
    		'transaction_limit' => $request->transaction_limit,
    	);
        $data = Query::InsertRow('membership_transaction_limits', $limit, 'limitTransaksi');
        return $data;
    }

    public function update(Request $request, $id){
    	$member = Member::find($request->member_id);
    	$limit = array(
    		'user_id' => $member->user_id, 
    		'member_no' => $member->member_no,
    		'email' => $member->email,
    		'transaction_limit' => $request->transaction_limit,
    	);
        $data = Query::UpdateRow('membership_transaction_limits', $id, $limit, 'limitTransaksi');
        return $data;   
    }

    public function delete($id){
        $data = Query::DeleteRow('membership_transaction_limits', $id);
        return $data;
    }
}
