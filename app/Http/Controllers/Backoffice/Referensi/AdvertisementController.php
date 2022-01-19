<?php

namespace App\Http\Controllers\Backoffice\Referensi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use yajra\Datatables\Datatables;
use App\Models\MasterData\Advertisement;
use App\Models\Membership\DokumenRepo;
use App\Utils\Query;
use Illuminate\Support\Facades\File;
use Session;

class AdvertisementController extends Controller
{
    public function index(Request $request)
    {
        $data = Query::PagingResponse($request, new Advertisement, 'backoffice.referensi.advertisement.index', 'advertisements');
        return $data;
    }

    public function create()
    {
        $data = Query::RedirectResponse('backoffice.referensi.advertisement.create');
        return $data;
    }

    public function edit($id){
        $value = Advertisement::find($id);

        return view('backoffice.referensi.advertisement.edit')
        ->with('value' , $value);
    }

    public function store(Request $request)
    {

        $advertisement = new Advertisement();
        $advertisement->status = $request->status;
        $advertisement->save();

        $dokumenRepo = new DokumenRepo;
        $dokumenRepo->reff_type = 303;
        $dokumenRepo->reff_id = $advertisement->id;
        if ($request->hasFile('ads_file')) {
            $ads_file = date("Ymd")
                . uniqid()
                . "."
                . $request->file('ads_file')->getClientOriginalName();
            $extension = $request->file('ads_file')->extension();

            $request->file('ads_file')->move(storage_path('ads_file'), $ads_file);
            $dokumenRepo->mime_type = $extension;
            $dokumenRepo->filename = $request->file('ads_file')->getClientOriginalName();
            $dokumenRepo->path = $ads_file;
        }
        $dokumenRepo->save();

        return redirect(route('advertisement'));
        // $data = Query::InsertRow('jenis_koperasis', $body, 'jenisKoperasi');
        // return $data;
    }

    public function update(Request $request , $id){
        $advertisement = Advertisement::find($id);
        $advertisement->status = $request->status;
        $advertisement->save();

        $dokumenRepo = DokumenRepo::where('reff_id' , $id)->first();
        $dokumenRepo->reff_type = 303;

        if ($request->hasFile('ads_file')) {
            // Deleting old file
            $file = $advertisement->dokumen_repo->path;
            $destinationPath = storage_path('ads_file');
            $filename = $destinationPath . '/' . $file;
            File::delete($filename);

            // Add new file
            $ads_file = date("Ymd")
                . uniqid()
                . "."
                . $request->file('ads_file')->getClientOriginalName();
            $extension = $request->file('ads_file')->extension();
            $request->file('ads_file')->move(storage_path('ads_file'), $ads_file);
            $dokumenRepo->mime_type = $extension;
            $dokumenRepo->filename = $request->file('ads_file')->getClientOriginalName();
            $dokumenRepo->path = $ads_file;
        }
        $dokumenRepo->save();
        return redirect(route('advertisement'));
    }

    public function delete($id)
    {
        $old_data = Advertisement::find($id);
        $file = $old_data->dokumen_repo->path;

        $dokumenRepo = DokumenRepo::where('reff_id', $old_data->id)->first();
        $dokumenRepo->delete();
        
        $destinationPath = storage_path('ads_file');
        $filename = $destinationPath . '/' . $file;
        File::delete($filename);

        $data = Query::DeleteRow('advertisements', $id);
        return $data;
    }
}
