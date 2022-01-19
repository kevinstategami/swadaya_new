<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterData\CMS;
use App\Helper\Constant;
use Session;
use App\Models\Membership\DokumenRepo;
use Illuminate\Support\Facades\File;

class SKController extends Controller
{
    public function indexImage()
	{
		$cms = CMS::where('code', 'BGSK')->first();
		$result = array(
			'id' => $cms ? $cms->id : 0,
			'dokumen' => $cms ? $cms->dokumen : null
		);
	    return $result;
	}

	public function updateImage(Request $request)
    {
    	if($request->id_imgSk){
	    	$BGSK = CMS::find($request->id_imgSk);
    	}else{
    		$BGSK = new CMS;
			$BGSK->code = 'BGSK';
    	}
		$BGSK->title = $request->title_au; 
		$BGSK->description = $request->description_au; 
		$BGSK->save();

        if ($request->hasFile('path_bgsk')) {
        	$dokumenRepo = DokumenRepo::where('reff_id' , $request->id_imgSk)->first();
			if(!$dokumenRepo){
				$dokumenRepo = new DokumenRepo;
			}
			$dokumenRepo->reff_id = $BGSK->id;
	        $dokumenRepo->reff_type = 404;

            // Deleting old file
            if($BGSK->dokumen){
	            $file = $BGSK->dokumen->path;
	            $destinationPath = storage_path('picture_file');
	            $filename = $destinationPath . '/' . $file;
	            File::delete($filename);
            }

            // Add new file
            $picture_file = date("Ymd")
                . uniqid()
                . "."
                . $request->file('path_bgsk')->getClientOriginalName();

            $extension = $request->file('path_bgsk')->extension();
            $request->file('path_bgsk')->move(storage_path('picture_file'), $picture_file);
            $dokumenRepo->mime_type = $extension;
            $dokumenRepo->filename = $request->file('path_bgsk')->getClientOriginalName();
            $dokumenRepo->path = $picture_file;
        	$dokumenRepo->save();
        }

    	Session::flash('title', Constant::SUCCESS_TITLE);
		Session::flash('text', Constant::SUCCESS_UPDATE_ROW);
		Session::flash('icon', Constant::SUCCESS_ICON);
    	return redirect()->back();
    }
}
