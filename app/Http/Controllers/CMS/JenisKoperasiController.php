<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterData\CMS;
use App\Helper\Constant;
use Session;

class JenisKoperasiController extends Controller
{
	public function index()
	{
	    $titleJenisKoperasi = CMS::where('code', 'TJK')->first();

	    return $titleJenisKoperasi;
	}

	public function update(Request $request)
    {
    	if($request->id_jenis_koperasi){
	    	$jenis_koperasi = CMS::find($request->id_jenis_koperasi);
    	}else{
    		$jenis_koperasi = new CMS;
			$jenis_koperasi->code = 'TJK';
    	}
		$jenis_koperasi->title = $request->judul_jenis_koperasi; 
		$jenis_koperasi->save();

    	Session::flash('title', Constant::SUCCESS_TITLE);
		Session::flash('text', Constant::SUCCESS_UPDATE_ROW);
		Session::flash('icon', Constant::SUCCESS_ICON);
    	return redirect()->back();
    }
}
