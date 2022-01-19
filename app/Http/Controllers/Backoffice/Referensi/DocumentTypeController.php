<?php

namespace App\Http\Controllers\Backoffice\Referensi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterData\DocumentType;
use App\Utils\Query;
use Session;

class DocumentTypeController extends Controller
{
    public function index(Request $request){
        $data = Query::PagingResponse($request, new DocumentType, 'backoffice.referensi.document-type.index', 'document_types');
        return $data;
    }

    public function create(){
        $data = Query::RedirectResponse('backoffice.referensi.document-type.create');
        return $data;
    }

    public function edit($id){
        $data = Query::RedirectResponse('backoffice.referensi.document-type.edit','document_types', 'id', $id);
        return $data;
    }

    public function store(Request $request){
        $data = Query::InsertRow('document_types', $request->all(), 'documentType');
        return $data;
    }

    public function update(Request $request, $id){
        $data = Query::UpdateRow('document_types', $id, $request->all(), 'documentType');
        return $data;   
    }

    public function delete($id){
        $data = Query::DeleteRow('document_types', $id);
        return $data;
    }
}
