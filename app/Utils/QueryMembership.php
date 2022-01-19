<?php
namespace App\Utils;

use App\Helper\Constant;
use DB;
use Session;
Use Redirect;
use App\Models\Membership\Downline;
use App\Models\Membership\Member;
use App\Models\Membership\DokumenRepo;

class QueryMembership {
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
			$data = $table->where('member_type', 2)->orderBy('member_since','DESC')->get();
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

	public static function GetDownline($request, $table, $column="", $value=""){
		if ($request->filled('type') && $request->type == true) {
			$columns = DB::getSchemaBuilder()->getColumnListing($table);
			if ($request->filled('search')) {
				if (!is_null($request->search['value'])) {
					foreach ($columns as $key => $value) {
						if ($key == 0) {
							$table = $table->where($value, 'like', '%'.strtolower($request->search['value']).'%');
						}
						else {
							$table = $table->orWhere($value, 'like', '%'.strtolower($request->search['value']).'%');
						}
					}
				}
			}
			$table = $table->where($column, $value);
			$count = $table->count();
			if($request->filled('start') || $request->filled('length'))
			{
				$table = $table->offset($request->start)->limit($request->length);
			}
			$data = $table->get();
			if($data){
				foreach ($data as $key => $value) {
					$value->fullname = Member::where($column, $value->user_id_downline)->value('fullname');
					$value->profile_pic = DokumenRepo::where('reff_id', $value->user_id)->value('path');
				}	
			}
			$response = [
				'draw' => $request->draw,
				'recordsTotal' => $count,
				'recordsFiltered' => $count,
				'data' => $data,
			];
			return response()->json($response, 200);
		}
	}

	public static function EditMembership($urlRedirect, $table = false, $column = null, $value = null){
		if($table){
			if($column){
				$where = 'WHERE '.$column.' = '.$value.'';
			}else{
				$where = null;
			}
			$sql = 'SELECT * FROM '.$table.' '.$where.'';
			$execute = DB::select($sql);
			$execute[0]->profile_pic = DokumenRepo::where('reff_id', $execute[0]->user_id)->value('path');
			return view($urlRedirect)->with('value', $execute[0]);
		}else{
			return view($urlRedirect);
		}
	}

	public static function InsertMembership($table, $body, $urlRedirect){
		unset($body['_token']);
		unset($body['username']);
		unset($body['password']);
		unset($body['picture_file']);
		$execute = DB::table($table)->insert($body);
		Session::flash('title', Constant::SUCCESS_TITLE);
		Session::flash('text', Constant::SUCCESS_INSERT_ROW);
		Session::flash('icon', Constant::SUCCESS_ICON);
		return redirect()->route($urlRedirect);
	}

	public static function UpdateMembership($table, $id, $body, $urlRedirect){
		unset($body['_token']);
		unset($body['picture_file']);
		$execute = DB::table($table)->where('id',$id)->update($body);
		Session::flash('title', Constant::SUCCESS_TITLE);
		Session::flash('text', Constant::SUCCESS_UPDATE_ROW);
		Session::flash('icon', Constant::SUCCESS_ICON);
		return redirect()->route($urlRedirect);
	}

	public static function DeleteMembership($table, $id){
		$execute = DB::table($table)->where('user_id', $id)->delete();
		Session::flash('title', Constant::SUCCESS_TITLE);
		Session::flash('text', Constant::SUCCESS_DELETE_ROW);
		Session::flash('icon', Constant::SUCCESS_ICON);
		return json_encode($execute);
	}

	public static function DeleteDownline($table, $id){
		$execute = DB::table($table)->where('id', $id)->delete();
		Session::flash('title', Constant::SUCCESS_TITLE);
		Session::flash('text', Constant::SUCCESS_DELETE_ROW);
		Session::flash('icon', Constant::SUCCESS_ICON);
		return json_encode($execute);
	}
}