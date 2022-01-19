<?php

namespace App\Http\Controllers\Backoffice\Compro;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Utils\Query;
class AboutController extends Controller
{
    public function index(){
        $data = Query::RedirectResponse('backoffice.compro.about-us.index','about_us', 'id', 1);
        return $data;
    }

    public function update(Request $request, $id){
        unset($request['files']);
        $data = Query::UpdateRow('about_us', $id, $request->all(), 'bAboutUs');
        return $data;
    }
}
