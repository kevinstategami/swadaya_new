<?php

namespace App\Http\Controllers\Backoffice\Compro;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use yajra\Datatables\Datatables;
use App\Models\Compro\Misi;
use App\Utils\Query;
use DB;

class MisiController extends Controller
{
    public function index(Request $request){
        $data = Query::PagingResponse($request, new Misi, 'backoffice.compro.misi.index', 'misis');
        return $data;
    }

	public function create(){
        $data = Query::RedirectResponse('backoffice.compro.misi.create');
        return $data;
    }

	public function edit($id){
        $data = Query::RedirectResponse('backoffice.compro.misi.edit','misis', 'id', $id);
        return $data;
    }

    public function store(Request $request){
    	$data = Query::InsertRow('misis', $request->all(), 'misi');
        return $data;
    }

    public function update(Request $request, $id){
        $data = Query::UpdateRow('misis', $id, $request->all(), 'misi');
        return $data;   
    }

    public function delete($id){
    	$data = Query::DeleteRow('misis', $id);
        return $data;
    }
}
