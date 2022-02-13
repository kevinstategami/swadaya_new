<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Utils\Query;
use Auth;
use App\User;
use App\Models\Compro\JenisKoperasi;
use App\Models\MasterData\CMS;
use App\Http\Controllers\CMS\ProgressController;
use App\Http\Controllers\CMS\JenisKoperasiController;
use App\Http\Controllers\CMS\FungsiPeranController;
use App\Http\Controllers\CMS\IntroductionAUController;
use App\Http\Controllers\CMS\IntroductionHMController;
use App\Http\Controllers\CMS\AboutUsController;
use App\Http\Controllers\CMS\SKController;
class HomeController extends Controller
{
    public function index()
    {
        $progress = (new ProgressController)->index();
        $introduction_homepage = (new IntroductionHMController)->index();
        $judul_jenis_koperasi = (new JenisKoperasiController)->index();
        $visi = Query::ObjectResponse('visis', 'id', 1);
        $misi = Query::GetResponse('misis');
        $aboutUs = (new AboutUsController)->index();
        $struktur = Query::GetResponse('struktur_anggotas');
        $jenis_koperasi = JenisKoperasi::all();
        $cms = CMS::where('code', 'homepage')->orderby('order','asc')->get();
        return view('homepage.index', compact('visi', 'misi', 'aboutUs', 'struktur', 'jenis_koperasi', 'progress', 'judul_jenis_koperasi', 'introduction_homepage', 'cms'));
    }

    public function aboutUs()
    {
        $aboutUs = Query::ObjectResponse('about_us', 'id', 1);
        $fungsi_peran = (new FungsiPeranController)->index();
        $imgau = (new FungsiPeranController)->indexImgAu();
        $bgau = (new IntroductionAUController)->index();
        $cms = CMS::where('code', 'about-us')->orderby('order','asc')->get();
        return view('about-us.index', compact('aboutUs', 'fungsi_peran','bgau','imgau','cms'));
    }

    public function sk()
    {
        $syarat = Query::GetResponse('syarat_keanggotaans'); 
        $keuntungan = Query::GetResponse('keuntungan_anggotas');
        $ketentuan = Query::GetResponse('ketentuan_anggotas');
        $bgsk = (new SKController)->indexImage();
    	return view('sk.index', compact('syarat', 'keuntungan', 'ketentuan', 'bgsk'));
    }

    public function setEditMode($editMode){
        $mode = true;
        if($editMode == 'y'){
            $mode = true;
        }else{
            $mode = false;
        }
        $user = User::find(Auth::user()->id);
        $user->edit_mode = !$mode;
        $user->save();

        return redirect()->back();
    }
}
