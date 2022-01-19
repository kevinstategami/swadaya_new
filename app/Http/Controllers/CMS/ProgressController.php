<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterData\CMS;
use App\Helper\Constant;
use Session;
class ProgressController extends Controller
{
    public function index() {
    	$secaraUmum = CMS::where('code', 'SU')->first();
    	$sejarah = CMS::where('code', 'SJRH')->orderBy('title', 'asc')->get();

    	$data = array(
    		'secara_umum' => $secaraUmum, 
    		'sejarah' => $sejarah
    	);
    	return $data;
    }

    public function update(Request $request)
    {
    	$secara_umum = CMS::find($request->id_secara_umum);
    	$secara_umum->description = $request->secara_umum; 
    	$secara_umum->save();

    	$tahun_pertama = CMS::find($request->id_tahun_pertama);
    	$tahun_pertama->title = $request->tahun_pertama;
    	$tahun_pertama->description = $request->desription_tahun_pertama;
    	$tahun_pertama->save();

    	$tahun_kedua = CMS::find($request->id_tahun_kedua);
    	$tahun_kedua->title = $request->tahun_kedua;
    	$tahun_kedua->description = $request->desription_tahun_kedua;
    	$tahun_kedua->save();

    	Session::flash('title', Constant::SUCCESS_TITLE);
		Session::flash('text', Constant::SUCCESS_UPDATE_ROW);
		Session::flash('icon', Constant::SUCCESS_ICON);
    	return redirect()->back();
    }
}
