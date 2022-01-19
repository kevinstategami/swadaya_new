<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterData\CMS;
use App\Helper\Constant;
use Session;
use App\Models\Membership\DokumenRepo;
use Illuminate\Support\Facades\File;

class IntroductionAUController extends Controller
{
    public function index()
	{
	    $BGAU = CMS::where('code', 'BGAU')->first();
	    return $BGAU;
	}

	public function update(Request $request)
    {
    	if($request->id_bgau){
	    	$BGAU = CMS::find($request->id_bgau);
    	}else{
    		$BGAU = new CMS;
			$BGAU->code = 'BGAU';
    	}
		$BGAU->title = $request->title_bgau; 
		$BGAU->description = $request->description_bgau; 
		$BGAU->save();

        if ($request->hasFile('path_bgau')) {
        	$dokumenRepo = DokumenRepo::where('reff_id' , $request->id_bgau)->first();
			if(!$dokumenRepo){
				$dokumenRepo = new DokumenRepo;
			}
			$dokumenRepo->reff_id = $BGAU->id;
	        $dokumenRepo->reff_type = 401;

            // Deleting old file
            if($BGAU->dokumen){
	            $file = $BGAU->dokumen->path;
	            $destinationPath = storage_path('picture_file');
	            $filename = $destinationPath . '/' . $file;
	            File::delete($filename);
            }

            // Add new file
            $picture_file = date("Ymd")
                . uniqid()
                . "."
                . $request->file('path_bgau')->getClientOriginalName();

            $extension = $request->file('path_bgau')->extension();
            $request->file('path_bgau')->move(storage_path('picture_file'), $picture_file);
            $dokumenRepo->mime_type = $extension;
            $dokumenRepo->filename = $request->file('path_bgau')->getClientOriginalName();
            $dokumenRepo->path = $picture_file;
        	$dokumenRepo->save();
        }

    	Session::flash('title', Constant::SUCCESS_TITLE);
		Session::flash('text', Constant::SUCCESS_UPDATE_ROW);
		Session::flash('icon', Constant::SUCCESS_ICON);
    	return redirect()->back();
    }
}
