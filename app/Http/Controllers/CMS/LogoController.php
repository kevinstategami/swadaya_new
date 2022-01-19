<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterData\CMS;
use App\Helper\Constant;
use Session;
use App\Models\Membership\DokumenRepo;
use Illuminate\Support\Facades\File;


class LogoController extends Controller
{
    public function index()
	{
	    $logo = CMS::where('code', 'LG')->first();
	    $loading = CMS::where('code', 'LLG')->first();

	    $data = array(
	    	'lg' => $logo,
	    	'llg' => $loading,
	    );
	    return $data;
	}

	public function update(Request $request){
		if($request->id_logo){
	    	$LG = CMS::find($request->id_logo);
    	}else{
    		$LG = new CMS;
			$LG->code = 'LG';
    	}
		$LG->save();

		if($request->id_llg){
	    	$LLG = CMS::find($request->id_llg);
    	}else{
    		$LLG = new CMS;
			$LLG->code = 'LLG';
    	}
		$LLG->save();

        if ($request->hasFile('lg')) {
        	$dokumenRepo = DokumenRepo::where('reff_id' , $request->id_logo)->first();
			if(!$dokumenRepo){
				$dokumenRepo = new DokumenRepo;
			}
			$dokumenRepo->reff_id = $LG->id;
	        $dokumenRepo->reff_type = 405;

            // Deleting old file
            if($LG->dokumen){
	            $file = $LG->dokumen->path;
	            $destinationPath = storage_path('picture_file');
	            $filename = $destinationPath . '/' . $file;
	            File::delete($filename);
            }

            // Add new file
            $picture_file = date("Ymd")
                . uniqid()
                . "."
                . $request->file('lg')->getClientOriginalName();

            $extension = $request->file('lg')->extension();
            $request->file('lg')->move(storage_path('picture_file'), $picture_file);
            $dokumenRepo->mime_type = $extension;
            $dokumenRepo->filename = $request->file('lg')->getClientOriginalName();
            $dokumenRepo->path = $picture_file;
        	$dokumenRepo->save();
        }

        if ($request->hasFile('llg')) {
        	$dokumenRepoLlg = DokumenRepo::where('reff_id' , $request->id_llg)->first();
			if(!$dokumenRepoLlg){
				$dokumenRepoLlg = new DokumenRepo;
			}
			$dokumenRepoLlg->reff_id = $LLG->id;
	        $dokumenRepoLlg->reff_type = 405;

            // Deleting old file
            if($LLG->dokumen){
	            $file = $LG->dokumen->path;
	            $destinationPath = storage_path('picture_file');
	            $filename = $destinationPath . '/' . $file;
	            File::delete($filename);
            }

            // Add new file
            $picture_file = date("Ymd")
                . uniqid()
                . "."
                . $request->file('llg')->getClientOriginalName();

            $extension = $request->file('llg')->extension();
            $request->file('llg')->move(storage_path('picture_file'), $picture_file);
            $dokumenRepoLlg->mime_type = $extension;
            $dokumenRepoLlg->filename = $request->file('llg')->getClientOriginalName();
            $dokumenRepoLlg->path = $picture_file;
        	$dokumenRepoLlg->save();
        }

    	Session::flash('title', Constant::SUCCESS_TITLE);
		Session::flash('text', Constant::SUCCESS_UPDATE_ROW);
		Session::flash('icon', Constant::SUCCESS_ICON);
    	return redirect()->back();
	}
}
