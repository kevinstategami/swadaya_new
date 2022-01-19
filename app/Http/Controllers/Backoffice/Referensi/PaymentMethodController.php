<?php

namespace App\Http\Controllers\Backoffice\Referensi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterData\PaymentMethod;
use App\Utils\Query;
use Session;

class PaymentMethodController extends Controller
{
    public function index(Request $request){
        $data = Query::PagingResponse($request, new PaymentMethod, 'backoffice.referensi.payment-method.index', 'payment_methods');
        return $data;
    }

    public function create(){
        $data = Query::RedirectResponse('backoffice.referensi.payment-method.create');
        return $data;
    }

    public function edit($id){
        $data = Query::RedirectResponse('backoffice.referensi.payment-method.edit','payment_methods', 'id', $id);
        return $data;
    }

    public function store(Request $request){
        $data = Query::InsertRow('payment_methods', $request->all(), 'paymentMethod');
        return $data;
    }

    public function update(Request $request, $id){
        $data = Query::UpdateRow('payment_methods', $id, $request->all(), 'paymentMethod');
        return $data;   
    }

    public function delete($id){
        $data = Query::DeleteRow('payment_methods', $id);
        return $data;
    }
}
