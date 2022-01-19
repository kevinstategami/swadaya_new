<?php

namespace App\Http\Controllers\Backoffice\Compro;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use yajra\Datatables\Datatables;
use App\Models\Compro\KetentuanAnggota;
use App\Utils\Query;
use Session;

class KetentuanKeanggotaanController extends Controller
{
    public function index(Request $request){
        $data = Query::PagingResponse($request, new KetentuanAnggota, 'backoffice.compro.ketentuan-keanggotaan.index', 'ketentuan_anggotas');
        return $data;
    }

    public function create(){
        $data = Query::RedirectResponse('backoffice.compro.ketentuan-keanggotaan.create');
        return $data;
    }

    public function edit($id){
        $data = Query::RedirectResponse('backoffice.compro.ketentuan-keanggotaan.edit','ketentuan_anggotas', 'id', $id);
        return $data;
    }

    public function store(Request $request){
        $data = Query::InsertRow('ketentuan_anggotas', $request->all(), 'ketentuanKeanggotaan');
        return $data;
    }

    public function update(Request $request, $id){
        $data = Query::UpdateRow('ketentuan_anggotas', $id, $request->all(), 'ketentuanKeanggotaan');
        return $data;   
    }

    public function delete($id){
        $data = Query::DeleteRow('ketentuan_anggotas', $id);
        return $data;
    }
}
