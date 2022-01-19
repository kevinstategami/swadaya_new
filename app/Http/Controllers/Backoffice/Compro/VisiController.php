<?php

namespace App\Http\Controllers\Backoffice\Compro;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use yajra\Datatables\Datatables;
use App\Models\Compro\Visi;
use App\Utils\Query;
use Session;

class VisiController extends Controller
{
    public function index(){
        $data = Query::RedirectResponse('backoffice.compro.visi.index','visis', 'id', 1);
        return $data;
    }

    public function update(Request $request, $id){
        unset($request['files']);
        $data = Query::UpdateRow('visis', $id, $request->all(), 'bVisi');
        return $data;
    }
}
