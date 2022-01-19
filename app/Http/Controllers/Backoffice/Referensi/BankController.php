<?php

namespace App\Http\Controllers\Backoffice\Referensi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterData\Bank;
use App\Utils\Query;
use Session;

class BankController extends Controller
{
    public function index(Request $request){
        $data = Query::PagingResponse($request, new Bank, 'backoffice.referensi.bank.index', 'banks');
        return $data;
    }

    public function create(){
        $data = Query::RedirectResponse('backoffice.referensi.bank.create');
        return $data;
    }

    public function edit($id){
        $data = Query::RedirectResponse('backoffice.referensi.bank.edit','banks', 'id', $id);
        return $data;
    }

    public function store(Request $request){
        $data = Query::InsertRow('banks', $request->all(), 'bank');
        return $data;
    }

    public function update(Request $request, $id){
        $data = Query::UpdateRow('banks', $id, $request->all(), 'bank');
        return $data;   
    }

    public function delete($id){
        $data = Query::DeleteRow('banks', $id);
        return $data;
    }
}
