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

class BlockController extends Controller
{
    public function index($page)
	{
		$cms = CMS::where('code', $page)->get();
	    return $cms;
	}

	public function getById($id)
	{
	    $imgau = CMS::find($id);
	    return $imgau;
	}

	public function delete($id){
		$cms = CMS::find($id);
		$cms->delete();

		return redirect(url('/'));
	}

	public function deleteIndexValue($index,$id){
		$cms = CMS::find($id);
		$split_title2 = explode("||", $cms->title2);
		$split_description = explode("||", $cms->title2);

		unset($split_title2[$index]);
		unset($split_description[$index]);
		
		$cms->title2 = "";
		$cms->description = "";

		foreach ($split_title2 as $key => $title2) {
			$cms->title2 .= $title2."||";
		}
		foreach ($split_description as $key => $description) {
			$cms->description .= $description."||";
		}

		$cms->title2 = substr($cms->title2, 0 , -1);
		$cms->description = substr($cms->description, 0 , -1);
		$cms->index_value = $cms->index_value - 1;
		$cms->save();

		return redirect()->back();
	}

	public function editCc($id){
		$cms = CMS::find($id);
		return view('block.cc-form')->with('value', $cms);
	}

	public function editlc($id){
		$cms = CMS::find($id);
		return view('block.lc-form')->with('value', $cms);
	}

	public function addIndexValue(Request $request){
		$cms = CMS::find($request->id);
		$cms->index_value = $cms->index_value + 1;
		$cms->save();

		return 'success';
	}

	public function create(Request $request){
		try {
			$count = CMS::where('code', $request->page)->count();
			$cms = new CMS;
			$cms->title = "New Block Title";
			$cms->title2 = "New Block Title 2";
			$cms->description = "New Block Description";
			$cms->block_type = $request->block_type;
			$cms->code = $request->page;
			$cms->order = $count + 1;
			$cms->index_value = 1;
			$cms->save();

			Session::flash('title', Constant::SUCCESS_TITLE);
			Session::flash('text', Constant::SUCCESS_INSERT_ROW);
			Session::flash('icon', Constant::SUCCESS_ICON);

			return "success";
		} catch (Exception $e) {
			Session::flash('title', Constant::ERROR_TITLE);
			Session::flash('icon', Constant::ERROR_ICON);
			return "error";
		}
	}

	public function update(Request $request){
		try {
			$cms_all = CMS::where('code', 'homepage')->orderby('order','asc')->get();
			$cms = CMS::find($request->id);

			if($cms->order != $request->order){
				foreach($cms_all as $key => $value){
					if($value->order >= $request->order + 1 || $value->order <= $cms->order){
						$value->order = $value->order + 1;
						$value->save();
					}			
				}
			}

			$cms->title = $request->title;
			$cms->title2 = $request->title2;
			$cms->description = $request->description;
			$cms->path = $request->path;
			$cms->background_path = $request->background_path;
			$cms->order = $request->order;
			$cms->index_value = $request->indexValue;
			$cms->save();

			Session::flash('title', Constant::SUCCESS_TITLE);
			Session::flash('text', Constant::SUCCESS_INSERT_ROW);
			Session::flash('icon', Constant::SUCCESS_ICON);

			return 'success';
		}catch (Exception $e){
			Session::flash('title', Constant::ERROR_TITLE);
			Session::flash('icon', Constant::ERROR_ICON);
			return 'error';
		}

	}

	public function uploadFile(Request $request){
		if ($request->hasFile('file')) {
            // Deleting old file
            if($request->filename){
	            $file = $request->filename;
	            $destinationPath = storage_path('cms_file');
	            $filename = $destinationPath . '/' . $file;
	            File::delete($filename);
            }

            // Add new file
            $picture_file = 'cms-'.date("Ymd").uniqid()."-". $request->file('file')->getClientOriginalName();
            $request->file('file')->move(storage_path('cms_file'), $picture_file);

        	return $picture_file;
        }else{
        	return 'gagal';
        }
	}
}
