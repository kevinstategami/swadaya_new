<?php

namespace App\Http\Controllers\Backoffice\Referensi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterData\Province;
use App\Utils\Query;
use Session;

class ProvinceController extends Controller
{
    public function index(Request $request){
        $data = Query::PagingResponse($request, new Province, 'backoffice.referensi.province.index', 'provinces');
        return $data;
    }

    public function create(){
        $data = Query::RedirectResponse('backoffice.referensi.province.create');
        return $data;
    }

    public function edit($id){
        $data = Query::RedirectResponse('backoffice.referensi.province.edit','provinces', 'id', $id);
        return $data;
    }

    public function store(Request $request){
    	$data = array(
    		'nama' => $request->nama,
    		'latitude' => $request->latitude,
    		'longitude' => $request->longitude,
    		'createdAt' => date("Y-m-d"),
    		'updatedAt' => date("Y-m-d"),
    	);
        $data = Query::InsertRow('provinces', $data, 'provinsi');
        return $data;
    }

    public function update(Request $request, $id){
    	$data = array(
    		'nama' => $request->nama,
    		'latitude' => $request->latitude,
    		'longitude' => $request->longitude,
    		'updatedAt' => date("Y-m-d"),
    	);
        $data = Query::UpdateRow('provinces', $id, $request->all(), 'provinsi');
        return $data;   
    }

    public function delete($id){
        $data = Query::DeleteRow('provinces', $id);
        return $data;
    }
}
