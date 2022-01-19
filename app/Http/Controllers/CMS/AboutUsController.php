<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Compro\AboutUs;
use App\Models\MasterData\CMS;
use App\Helper\Constant;
use Session;
use App\Models\Membership\DokumenRepo;
use Illuminate\Support\Facades\File;

class AboutUsController extends Controller
{
    public function index()
	{
		$cms = CMS::where('code', 'BGAUHM')->first();
	    $aboutUs = AboutUs::first();
		$result = array(
			'id' => $cms ? $cms->id : 0,
			'title' => $cms ?$cms->title : '',
			'description' => $cms ? $cms->description : '',
			'content' => $aboutUs->content,
			'dokumen' => $cms ? $cms->dokumen : null
		);
	    return $result;
	}

	public function update(Request $request)
    {
    	$about = AboutUs::first();
    	$about->content = $request->content_au;
    	$about->save();

    	if($request->id_au){
	    	$BGAUHM = CMS::find($request->id_au);
    	}else{
    		$BGAUHM = new CMS;
			$BGAUHM->code = 'BGAUHM';
    	}
		$BGAUHM->title = $request->title_au; 
		$BGAUHM->description = $request->description_au; 
		$BGAUHM->save();

        if ($request->hasFile('path_bgauhm')) {
        	$dokumenRepo = DokumenRepo::where('reff_id' , $request->id_au)->first();
			if(!$dokumenRepo){
				$dokumenRepo = new DokumenRepo;
			}
			$dokumenRepo->reff_id = $BGAUHM->id;
	        $dokumenRepo->reff_type = 404;

            // Deleting old file
            if($BGAUHM->dokumen){
	            $file = $BGAUHM->dokumen->path;
	            $destinationPath = storage_path('picture_file');
	            $filename = $destinationPath . '/' . $file;
	            File::delete($filename);
            }

            // Add new file
            $picture_file = date("Ymd")
                . uniqid()
                . "."
                . $request->file('path_bgauhm')->getClientOriginalName();

            $extension = $request->file('path_bgauhm')->extension();
            $request->file('path_bgauhm')->move(storage_path('picture_file'), $picture_file);
            $dokumenRepo->mime_type = $extension;
            $dokumenRepo->filename = $request->file('path_bgauhm')->getClientOriginalName();
            $dokumenRepo->path = $picture_file;
        	$dokumenRepo->save();
        }

    	Session::flash('title', Constant::SUCCESS_TITLE);
		Session::flash('text', Constant::SUCCESS_UPDATE_ROW);
		Session::flash('icon', Constant::SUCCESS_ICON);
    	return redirect()->back();
    }
}
