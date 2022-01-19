<?php

namespace App\Http\Controllers\Backoffice\Compro;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use yajra\Datatables\Datatables;
use App\Models\Compro\KeuntunganAnggota;
use App\Utils\Query;
use Session;

class KeuntunganAnggotaController extends Controller
{
    public function index(Request $request){
        $data = Query::PagingResponse($request, new KeuntunganAnggota, 'backoffice.compro.keuntungan-anggota.index', 'keuntungan_anggotas');
        return $data;
    }

    public function create(){
        $data = Query::RedirectResponse('backoffice.compro.keuntungan-anggota.create');
        return $data;
    }

    public function edit($id){
        $data = Query::RedirectResponse('backoffice.compro.keuntungan-anggota.edit','keuntungan_anggotas', 'id', $id);
        return $data;
    }

    public function store(Request $request){
        $data = Query::InsertRow('keuntungan_anggotas', $request->all(), 'keuntunganAnggota');
        return $data;
    }

    public function update(Request $request, $id){
        $data = Query::UpdateRow('keuntungan_anggotas', $id, $request->all(), 'keuntunganAnggota');
        return $data;   
    }

    public function delete($id){
        $data = Query::DeleteRow('keuntungan_anggotas', $id);
        return $data;
    }
}
