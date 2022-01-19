<?php

namespace App\Http\Controllers\Backoffice\Compro;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use yajra\Datatables\Datatables;
use App\Models\Compro\SyaratKeanggotaan;
use App\Utils\Query;
use Session;
class SyaratKeanggotaanController extends Controller
{
    public function index(Request $request){
        $data = Query::PagingResponse($request, new SyaratKeanggotaan, 'backoffice.compro.syarat-keanggotaan.index', 'syarat_keanggotaans');
        return $data;
    }

    public function create(){
        $data = Query::RedirectResponse('backoffice.compro.syarat-keanggotaan.create');
        return $data;
    }

    public function edit($id){
        $data = Query::RedirectResponse('backoffice.compro.syarat-keanggotaan.edit','syarat_keanggotaans', 'id', $id);
        return $data;
    }

    public function store(Request $request){
        $data = Query::InsertRow('syarat_keanggotaans', $request->all(), 'syaratKeanggotaan');
        return $data;
    }

    public function update(Request $request, $id){
        $data = Query::UpdateRow('syarat_keanggotaans', $id, $request->all(), 'syaratKeanggotaan');
        return $data;   
    }

    public function delete($id){
        $data = Query::DeleteRow('syarat_keanggotaans', $id);
        return $data;
    }
}
