<?php

namespace App\Http\Controllers\Backoffice\Referensi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterData\City;
use App\Models\MasterData\Province;
use App\Utils\Query;
use Session;

class CityController extends Controller
{
    public function index(Request $request){
        $data = Query::PagingResponse($request, new City, 'backoffice.referensi.city.index', 'cities');
        return $data;
    }

    public function create(){
        $province = Province::all();

        return view('backoffice.referensi.city.create')
        ->with('province', $province);
    }

    public function edit($id){
    	$data = City::find($id);
    	$province = Province::all();

    	return view('backoffice.referensi.city.edit')
        ->with('value', $data)
        ->with('province', $province);
    }

    public function store(Request $request){
    	$data = array(
    		'nama' => $request->nama,
    		'idProv' => $request->idProv,
    		'latitude' => $request->latitude,
    		'longitude' => $request->longitude,
    		'createdAt' => date("Y-m-d"),
    		'updatedAt' => date("Y-m-d"),
    	);
        $data = Query::InsertRow('cities', $request->all(), 'kota');
        return $data;
    }

    public function update(Request $request, $id){
    	$data = array(
    		'nama' => $request->nama,
    		'idProv' => $request->idProv,
    		'latitude' => $request->latitude,
    		'longitude' => $request->longitude,
    		'updatedAt' => date("Y-m-d"),
    	);
        $data = Query::UpdateRow('cities', $id, $request->all(), 'kota');
        return $data;   
    }

    public function delete($id){
        $data = Query::DeleteRow('cities', $id);
        return $data;
    }
}
