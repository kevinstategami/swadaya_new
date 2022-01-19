<?php

namespace App\Http\Controllers\Backoffice\Referensi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterData\SimpananType;
use App\Models\MasterData\SHU;
use App\Utils\Query;
use Session;
class JenisSimpananController extends Controller
{
    public function index(Request $request){
        $data = Query::PagingResponse($request, new SimpananType, 'backoffice.referensi.jenis-simpanan.index', 'simpanan_types');
        return $data;
    }

    public function create(){
        $shu = SHU::all();

        return view('backoffice.referensi.jenis-simpanan.create')
        ->with('shu', $shu);
    }

    public function edit($id){
        $shus = SHU::all();
        $value = SimpananType::find($id);

        return view('backoffice.referensi.jenis-simpanan.edit')
        ->with('shus' , $shus)
        ->with('value', $value);
    }

    public function store(Request $request){
        $data = Query::InsertRow('simpanan_types', $request->all(), 'jenisSimpanan');
        return $data;
    }

    public function update(Request $request, $id){
        $data = Query::UpdateRow('simpanan_types', $id, $request->all(), 'jenisSimpanan');
        return $data;   
    }

    public function delete($id){
        $data = Query::DeleteRow('simpanan_types', $id);
        return $data;
    }
}
