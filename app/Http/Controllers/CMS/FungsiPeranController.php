<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterData\CMS;
use App\Helper\Constant;
use Session;
use App\Models\Membership\DokumenRepo;
use Illuminate\Support\Facades\File;

class FungsiPeranController extends Controller
{
    public function index()
	{
	    $FP1 = CMS::where('code', 'FP1')->first();
	    $FP2 = CMS::where('code', 'FP2')->first();

	    $data = array(
	    	'fungsi_peran_1' => $FP1,
	    	'fungsi_peran_2' => $FP2,
	    );
	    return $data;
	}

	public function indexImgAu()
	{
	    $imgau = CMS::where('code', 'IMGAU')->first();
	    return $imgau;
	}

	public function update(Request $request)
    {
    	if($request->id_fp_1){
	    	$FP1 = CMS::find($request->id_fp_1);
    	}else{
    		$FP1 = new CMS;
			$FP1->code = 'FP1';
    	}
		$FP1->title = $request->title_fp_1; 
		$FP1->description = $request->description_fp_1; 
		$FP1->save();

    	if($request->id_fp_2){
	    	$FP1 = CMS::find($request->id_fp_2);
    	}else{
    		$FP1 = new CMS;
			$FP1->code = 'FP2';
    	}
		$FP1->title = $request->title_fp_2; 
		$FP1->description = $request->description_fp_2; 
		$FP1->save();

    	Session::flash('title', Constant::SUCCESS_TITLE);
		Session::flash('text', Constant::SUCCESS_UPDATE_ROW);
		Session::flash('icon', Constant::SUCCESS_ICON);
    	return redirect()->back();
    }

    public function updateImgAu(Request $request)
    {
    	if($request->id_imgau){
	    	$IMGAU = CMS::find($request->id_imgau);
    	}else{
    		$IMGAU = new CMS;
			$IMGAU->code = 'IMGAU';
    	}
		$IMGAU->save();

        if ($request->hasFile('path_imgau')) {
        	$dokumenRepo = DokumenRepo::where('reff_id' , $request->id_imgau)->first();
			if(!$dokumenRepo){
				$dokumenRepo = new DokumenRepo;
			}
			$dokumenRepo->reff_id = $IMGAU->id;
	        $dokumenRepo->reff_type = 402;

            // Deleting old file
            if($IMGAU->dokumen){
	            $file = $IMGAU->dokumen->path;
	            $destinationPath = storage_path('picture_file');
	            $filename = $destinationPath . '/' . $file;
	            File::delete($filename);
            }

            // Add new file
            $picture_file = date("Ymd")
                . uniqid()
                . "."
                . $request->file('path_imgau')->getClientOriginalName();

            $extension = $request->file('path_imgau')->extension();
            $request->file('path_imgau')->move(storage_path('picture_file'), $picture_file);
            $dokumenRepo->mime_type = $extension;
            $dokumenRepo->filename = $request->file('path_imgau')->getClientOriginalName();
            $dokumenRepo->path = $picture_file;
        	$dokumenRepo->save();
        }

    	Session::flash('title', Constant::SUCCESS_TITLE);
		Session::flash('text', Constant::SUCCESS_UPDATE_ROW);
		Session::flash('icon', Constant::SUCCESS_ICON);
    	return redirect()->back();
    }
}
