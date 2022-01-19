<?php

namespace App\Http\Controllers\Backoffice\Referensi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterData\Shu;
use App\Utils\Query;
use Session;

class ShuController extends Controller
{
    public function index(Request $request){
        $data = Query::PagingResponse($request, new Shu, 'backoffice.referensi.shu.index', 'shus');
        return $data;
    }

    public function create(){
        $data = Query::RedirectResponse('backoffice.referensi.shu.create');
        return $data;
    }

    public function edit($id){
        $data = Query::RedirectResponse('backoffice.referensi.shu.edit','shus', 'id', $id);
        return $data;
    }

    public function store(Request $request){
        $data = Query::InsertRow('shus', $request->all(), 'SHU');
        return $data;
    }

    public function update(Request $request, $id){
        $data = Query::UpdateRow('shus', $id, $request->all(), 'SHU');
        return $data;   
    }

    public function delete($id){
        $data = Query::DeleteRow('shus', $id);
        return $data;
    }
}
