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
        $cms = CMS::where('code', 'homepage')->orderby('order','asc')->get();
        return view('homepage.index', compact('cms'));
    }

    public function aboutUs()
    {
        $cms = CMS::where('code', 'about-us')->orderby('order','asc')->get();
        return view('about-us.index', compact('cms'));
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
