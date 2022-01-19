<?php

namespace App\Http\Controllers\Backoffice\Referensi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterData\ReferralBonus;
use App\Utils\Query;
use Session;

class ReferralBonusController extends Controller
{
    public function index(Request $request){
        $data = Query::PagingResponse($request, new ReferralBonus, 'backoffice.referensi.referral-bonus.index', 'referral_bonuses');
        return $data;
    }

    public function create(){
        $data = Query::RedirectResponse('backoffice.referensi.referral-bonus.create');
        return $data;
    }

    public function edit($id){
        $data = Query::RedirectResponse('backoffice.referensi.referral-bonus.edit','referral_bonuses', 'id', $id);
        return $data;
    }

    public function store(Request $request){
        $data = Query::InsertRow('referral_bonuses', $request->all(), 'referralBonus');
        return $data;
    }

    public function update(Request $request, $id){
        $data = Query::UpdateRow('referral_bonuses', $id, $request->all(), 'referralBonus');
        return $data;   
    }

    public function delete($id){
        $data = Query::DeleteRow('referral_bonuses', $id);
        return $data;
    }
}
