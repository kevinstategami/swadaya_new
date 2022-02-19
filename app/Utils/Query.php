<?php
namespace App\Utils;

use App\Helper\Constant;
use DB;
use Session;
Use Redirect;

class Query {
	public static function PagingResponse($request, $table, $viewReturn, $table_name = ''){
		if ($request->filled('type') && $request->type == true) {
			$columns = DB::getSchemaBuilder()->getColumnListing($table_name);
			if ($request->filled('search')) {
				if (!is_null($request->search['value'])) {
					foreach ($columns as $key => $value) {
						if ($key == 0) {
							$table = $table->where($value, 'ilike', '%'.strtolower($request->search['value']).'%');
						}
						else {
							$table = $table->orWhere($value, 'ilike', '%'.strtolower($request->search['value']).'%');
						}
					}
				}
			}
			$count = $table->count();
			if($request->filled('start') || $request->filled('length'))
			{
				$table = $table->offset($request->start)->limit($request->length);
			}
			$data = $table->get();
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

	public static function PagingResponseInvoice($request, $table, $viewReturn, $table_name = ''){
		if ($request->filled('type') && $request->type == true) {
			$columns = DB::getSchemaBuilder()->getColumnListing($table_name);
			if ($request->filled('search')) {
				if (!is_null($request->search['value'])) {
					foreach ($columns as $key => $value) {
						if ($key == 0) {
							$table = $table->where($value, 'ilike', '%'.strtolower($request->search['value']).'%');
						}
						else {
							$table = $table->orWhere($value, 'ilike', '%'.strtolower($request->search['value']).'%');
						}
					}
				}
			}
			$count = $table->count();
			if($request->filled('start') || $request->filled('length'))
			{
				$table = $table->offset($request->start)->limit($request->length);
			}
			$data = $table->where('status', '<>', 9999)->orderBy('status','ASC')->get();
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

	public static function GetResponse($table, $query = ""){
		if($query){
			$where = 'WHERE description = '.$query.'';
		}else{
			$where = null;
		}
		$sql = 'SELECT * FROM '.$table.' '.$where;
		$execute = DB::select($sql);
		if($table){
			$out['returnValue'] = Constant::SUCCESS_CODE;
			$out['message'] = Constant::SUCCESS_MESSAGE;
			$out['object'] = $execute;
		}else{
			$out['returnValue'] = Constant::ERROR_CODE;
			$out['message'] = Constant::ERROR_MESSAGE;
		}
		return $out;
	}

	public static function ObjectResponse($table, $column = null, $value){
		$sql = 'SELECT * FROM '.$table.'';
		if($column){
			$sql .= ' WHERE '.$column.' = '."'".$value."'";
		}
		$execute = DB::select($sql);

		if($execute){
			$out['returnValue'] = Constant::SUCCESS_CODE;
			$out['message'] = Constant::SUCCESS_MESSAGE;
			$out['object'] = $execute[0];
		}else{
			$out['returnValue'] = Constant::ERROR_CODE;
			$out['message'] = Constant::ERROR_MESSAGE;
		}
		return $out;
	}

	public static function RedirectResponse($urlRedirect,$table = false, $column = null, $value = null){
		if($table){
			if($column){
				$where = 'WHERE '.$column.' = '.$value.'';
			}else{
				$where = null;
			}
			$sql = 'SELECT * FROM '.$table.' '.$where.'';
			$execute = DB::select($sql);
			return view($urlRedirect)->with('value', $execute[0]);
		}else{
			return view($urlRedirect);
		}
	}

	public static function InsertRow($table, $body, $urlRedirect){
		unset($body['_token']);
		$execute = DB::table($table)->insert($body);
		Session::flash('title', Constant::SUCCESS_TITLE);
		Session::flash('text', Constant::SUCCESS_INSERT_ROW);
		Session::flash('icon', Constant::SUCCESS_ICON);
		return redirect()->route($urlRedirect);
	}

	public static function UpdateRow($table, $id, $body, $urlRedirect){
		unset($body['_token']);
		$execute = DB::table($table)->where('id',$id)->update($body);
		Session::flash('title', Constant::SUCCESS_TITLE);
		Session::flash('text', Constant::SUCCESS_UPDATE_ROW);
		Session::flash('icon', Constant::SUCCESS_ICON);
		return redirect()->route($urlRedirect);
	}

	public static function DeleteRow($table, $id){
		$execute = DB::table($table)->delete($id);
		Session::flash('title', Constant::SUCCESS_TITLE);
		Session::flash('text', Constant::SUCCESS_DELETE_ROW);
		Session::flash('icon', Constant::SUCCESS_ICON);
		return json_encode($execute);
	}

	public static function GetHistoryWallet($request, $table, $column="", $value="", $table_name = ''){
		if ($request->filled('type') && $request->type == true) {
			$columns = DB::getSchemaBuilder()->getColumnListing($table_name);
			if ($request->filled('search')) {
				if (!is_null($request->search['value'])) {
					foreach ($columns as $key => $value) {
						if ($key == 0) {
							$table = $table->where($value, 'ilike', '%'.strtolower($request->search['value']).'%');
						}
						else {
							$table = $table->orWhere($value, 'ilike', '%'.strtolower($request->search['value']).'%');
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
			$response = [
				'draw' => $request->draw,
				'recordsTotal' => $count,
				'recordsFiltered' => $count,
				'data' => $data,
			];
			return response()->json($response, 200);
		}
	}


}
