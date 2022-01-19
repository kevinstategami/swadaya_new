<?php

namespace App\Http\Controllers\Backoffice\Compro;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use yajra\Datatables\Datatables;
use App\Models\Compro\JenisKoperasi;
use App\Models\Membership\DokumenRepo;
use App\Utils\Query;
use Illuminate\Support\Facades\File;
use Session;

class JenisKoperasiController extends Controller
{
    public function index(Request $request)
    {
        $data = Query::PagingResponse($request, new JenisKoperasi, 'backoffice.compro.jenis-koperasi.index', 'jenis_koperasis');
        return $data;
    }

    public function create()
    {
        $data = Query::RedirectResponse('backoffice.compro.jenis-koperasi.create');
        return $data;
    }

    public function edit($id)
    {
        $value = JenisKoperasi::find($id);

        return view('backoffice.compro.jenis-koperasi.edit')
        ->with('value', $value);
    }

    public function store(Request $request)
    {

        $jenisKoperasi = new JenisKoperasi();
        $jenisKoperasi->title = $request->title;
        $jenisKoperasi->description = $request->description;
        $jenisKoperasi->save();

        $dokumenRepo = new DokumenRepo;
        $dokumenRepo->reff_type = 301;
        $dokumenRepo->reff_id = $jenisKoperasi->id;
        if ($request->hasFile('picture_file')) {
            $picture_file = date("Ymd")
                . uniqid()
                . "."
                . $request->file('picture_file')->getClientOriginalName();
            $extension = $request->file('picture_file')->extension();

            $request->file('picture_file')->move(storage_path('picture_file'), $picture_file);
            $dokumenRepo->mime_type = $extension;
            $dokumenRepo->filename = $request->file('picture_file')->getClientOriginalName();
            $dokumenRepo->path = $picture_file;
        }
        $dokumenRepo->save();

        return redirect(route('jenisKoperasi'));
        // $data = Query::InsertRow('jenis_koperasis', $body, 'jenisKoperasi');
        // return $data;
    }

    public function update(Request $request, $id)
    {
        // $old_data = Query::ObjectResponse('jenis_koperasis', 'id', $id);
        $old_data = JenisKoperasi::find($id);
        $body = $request->all();

        $dokumenRepo = DokumenRepo::where('reff_id' , $id)->first();
        $dokumenRepo->reff_type = 301;

        if ($request->hasFile('picture_file')) {
            // Deleting old file
            $file = $old_data->dokumen->path;
            $destinationPath = storage_path('picture_file');
            $filename = $destinationPath . '/' . $file;
            File::delete($filename);

            // Add new file
            $picture_file = date("Ymd")
                . uniqid()
                . "."
                . $request->file('picture_file')->getClientOriginalName();

            $extension = $request->file('picture_file')->extension();
            $request->file('picture_file')->move(storage_path('picture_file'), $picture_file);
            $dokumenRepo->mime_type = $extension;
            $dokumenRepo->filename = $request->file('picture_file')->getClientOriginalName();
            $dokumenRepo->path = $picture_file;
        }
        $dokumenRepo->save();

        unset($body['picture_file']);
        $data = Query::UpdateRow('jenis_koperasis', $id, $body, 'jenisKoperasi');
        return $data;
    }

    public function delete($id)
    {
        // $old_data = Query::ObjectResponse('jenis_koperasis', 'id', $id);
        $old_data = JenisKoperasi::find($id);
        $file = $old_data->dokumen->path;

        $dokumenRepo = DokumenRepo::where('reff_id', $old_data->id)->first();
        $dokumenRepo->delete();
        
        $destinationPath = storage_path('picture_file');
        $filename = $destinationPath . '/' . $file;
        File::delete($filename);

        $data = Query::DeleteRow('jenis_koperasis', $id);
        return $data;
    }
}
