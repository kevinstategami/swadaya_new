<?php

namespace App\Http\Controllers\Backoffice\Compro;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use yajra\Datatables\Datatables;
use App\Models\Compro\StrukturAnggota;
use App\Utils\Query;
use Illuminate\Support\Facades\File;
use App\Models\Membership\DokumenRepo;
use Session;

class StrukturAnggotaController extends Controller
{
    public function index(Request $request)
    {
        $data = Query::PagingResponse($request, new StrukturAnggota, 'backoffice.compro.struktur-anggota.index', 'struktur_anggotas');
        return $data;
    }

    public function create()
    {
        $data = Query::RedirectResponse('backoffice.compro.struktur-anggota.create');
        return $data;
    }

    public function edit($id)
    {
        $value = StrukturAnggota::find($id);

        return view('backoffice.compro.struktur-anggota.edit')
        ->with('value', $value);

        // $data = Query::RedirectResponse('backoffice.compro.struktur-anggota.edit','struktur_anggotas', 'id', $id);
        // return $data;
    }

    public function store(Request $request)
    {
        $body = $request->all();
        $body['profile_pic'] = "";

        $teams = new StrukturAnggota;
        $teams->nama = $request->nama;
        $teams->divisi = $request->divisi;
        $teams->profile_pic = '';
        $teams->save();

        $dokumenRepo = new DokumenRepo;
        $dokumenRepo->reff_type = 302;
        $dokumenRepo->reff_id = $teams->id;
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

        return redirect(route('strukturAnggota'));

        // $data = Query::InsertRow('struktur_anggotas', $body, 'strukturAnggota');
        // return $data;
    }

    public function update(Request $request, $id)
    {
        // $old_data = Query::ObjectResponse('struktur_anggotas', 'id', $id);
        $old_data = StrukturAnggota::find($id);
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
        $data = Query::UpdateRow('struktur_anggotas', $id, $body, 'strukturAnggota');
        return $data;
    }

    public function delete($id)
    {
        $old_data = StrukturAnggota::find($id);
        $file = $old_data->dokumen->path;

        $dokumenRepo = DokumenRepo::where('reff_id', $old_data->id)->first();
        $dokumenRepo->delete();
        
        $destinationPath = storage_path('picture_file');
        $filename = $destinationPath . '/' . $file;
        File::delete($filename);

        $data = Query::DeleteRow('struktur_anggotas', $id);
        return $data;
    }
}
