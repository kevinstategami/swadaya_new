<?php
namespace App\Utils;

use App\Helper\Constant;
use DB;
use Session;
Use Redirect;
use App\Models\Membership\Downline;
use App\Models\Membership\Member;
use App\Models\Membership\DokumenRepo;

class QueryUser {
	public static function PagingResponse($request, $table, $viewReturn, $table_name = ''){
		if ($request->filled('type') && $request->type == true) {
			$columns = DB::getSchemaBuilder()->getColumnListing($table_name);
			if ($request->filled('search')) {
				if (!is_null($request->search['value'])) {
					foreach ($columns as $key => $value) {
						if ($key == 0) {
							$table = $table->where($value, 'ilike', '%'.$request->search['value'].'%');
						}
						else {
							$table = $table->orWhere($value, 'ilike', '%'.$request->search['value'].'%');
						}
					}
				}
			}
			$count = $table->count();
			if($request->filled('start') || $request->filled('length'))
			{
				$table = $table->offset($request->start)->limit($request->length);
			}
			$data = $table->where('type', 'MEMBER')->where('status_aktivasi', 2)->orderBy('created_at','DESC')->get();
			$response = [
				'draw' => $request->draw,
				'recordsTotal' => $count,
				'recordsFiltered' => $count,
				'data' => $data,
			];
			return response()->json($response, 200);
		}
		return view($viewReturn);
	}

	public static function DeleteMembership($table, $id){
		$execute = DB::table($table)->where('id', $id)->delete();
		Session::flash('title', Constant::SUCCESS_TITLE);
		Session::flash('text', Constant::SUCCESS_DELETE_ROW);
		Session::flash('icon', Constant::SUCCESS_ICON);
		return json_encode($execute);
	}
}