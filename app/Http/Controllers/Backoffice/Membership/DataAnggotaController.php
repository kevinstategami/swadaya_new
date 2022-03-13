<?php

namespace App\Http\Controllers\Backoffice\Membership;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Utils\QueryUser;
use App\Utils\Query;
use App\Utils\QueryMembership;
use App\Models\Membership\Member;
use App\Models\Membership\Downline;
use App\Models\Membership\DokumenRepo;
use App\Models\MasterData\City;
use App\Models\MasterData\Province;
Use App\Models\Transaction\Invoice;
Use App\Models\Transaction\Wallet;
Use App\Models\Transaction\WalletHistory;
use App\Models\MasterData\SimpananType;
use App\Models\MasterData\ReferralBonus;
use App\Models\Membership\Simpanan;
use App\Models\Membership\ReferalCode;
use App\User;
use DB;

class DataAnggotaController extends Controller
{
	public function index(Request $request){
		$data = QueryMembership::PagingResponse($request, new Member, 'backoffice.membership.index', 'membership_account');
		return $data;
	}

	public function downlineAnggota(Request $request, $id){
		$data = QueryMembership::GetDownline($request, new Downline, 'user_id', $id);
		return $data;
	}

	public function deleteDownline($id){
		$data = QueryMembership::DeleteDownline('downlines', $id);
		return $data;
	}

	public function editAnggota($id, Request $request){
		$view = QueryMembership::EditMembership('backoffice.membership.edit','membership_account', 'user_id', $id);
		if($request->filled('province') && $request->province == true){
			$province = new Province;
			$province = $province->select('id', 'nama as text');
			if($request->filled('search')){
				$province = $province->where(DB::raw('LOWER(nama)'), 'like', '%'.strtolower($request->search).'%');
			}
			$data['results'] = $province->distinct('nama')->take(10)->get();
			return response()->json($data, 200);
		}
		if($request->filled('cities') && $request->cities == true){
			$cities = new City;
			$cities = $cities->select('id', 'nama as text');
			if($request->filled('province_id')){
				$cities = $cities->where('idProv', $request->province_id);
			}
			if($request->filled('search')){
				$cities = $cities->where(DB::raw('LOWER(nama)'), 'like', '%'.strtolower($request->search).'%');
			}
			$data['results'] = $cities->distinct('nama')->take(10)->get();
			return response()->json($data, 200);
		}
		return $view;
	}

	public function createAnggota(Request $request)
	{
		$view = Query::RedirectResponse('backoffice.membership.create');
		if($request->filled('province') && $request->province == true){
			$province = new Province;
			$province = $province->select('id', 'nama as text');
			if($request->filled('search')){
				$province = $province->where(DB::raw('LOWER(nama)'), 'like', '%'.strtolower($request->search).'%');
			}
			$data['results'] = $province->distinct('nama')->take(10)->get();
			return response()->json($data, 200);
		}
		if($request->filled('cities') && $request->cities == true){
			$cities = new City;
			$cities = $cities->select('id', 'nama as text');
			if($request->filled('province_id')){
				$cities = $cities->where('idProv', $request->province_id);
			}
			if($request->filled('search')){
				$cities = $cities->where(DB::raw('LOWER(nama)'), 'like', '%'.strtolower($request->search).'%');
			}
			$data['results'] = $cities->distinct('nama')->take(10)->get();
			return response()->json($data, 200);
		}
		return $view;
	}

	public function saveAnggota(Request $request){
		$user = new User();
		$user->name = $request->fullname;
		$user->username = $request->username;
		$user->email = $request->email;
		$user->password = bcrypt($request->password);
		$user->status_aktivasi = 4;
		$user->save();
		$body = $request->all();	
		$countMember = Member::where('member_type', '1')->count();
		$body['user_id'] = $user->id;
		$body['member_no'] = 'AB'.sprintf("%'03d", $countMember).$this->quickRandom(4);
		$body['member_type'] = 2;
		$body['member_since'] = date("Y-m-d");
		$data = QueryMembership::InsertMembership('membership_account', $body, 'anggota');
		$dokumenRepo = new DokumenRepo;
		$dokumenRepo->reff_id = $user->id;
		$dokumenRepo->reff_type = 101;
		$dokumenRepo->filename = $user->email;
		if ($request->hasFile('picture_file')) {
			$picture_file = date("Ymd")
			. uniqid()
			. "."
			. $request->file('picture_file')->getClientOriginalName();
			$request->file('picture_file')->move(storage_path('picture_file'), $picture_file);
			$dokumenRepo->mime_type = '.png';
			$dokumenRepo->path = $picture_file;
		}
		$dokumenRepo->save();
		return $data;
	}

	public function updateAnggota(Request $request, $id){
		$body = $request->all();
		$data = QueryMembership::UpdateMembership('membership_account', $id, $body, 'anggota');
		$dokumenRepo = DokumenRepo::where('reff_id', $request->user_id)->first();
		if($dokumenRepo && $request->picture_file){
			$dokumenRepo->reff_id = $request->user_id;
			$dokumenRepo->reff_type = 101;
			$dokumenRepo->filename = $request->fullname . ' ' .date('Y-m-d H:s');
			if ($request->hasFile('picture_file')) {
				$picture_file = date("Ymd")
				. uniqid()
				. "."
				. $request->file('picture_file')->getClientOriginalName();
				$request->file('picture_file')->move(storage_path('picture_file'), $picture_file);
				$dokumenRepo->mime_type = '.png';
				$dokumenRepo->path = $picture_file;
			}
			$dokumenRepo->save();
		}
		return $data;
	}

	public function deleteAnggota($id){
		$user = User::find($id);
		$user->status_aktivasi = 0;
		$user->save();
		$simpanan = Simpanan::where('user_id',$id)->delete();
		// $downline = Downline::where('user_id_downline',$id)->delete();
		$wallet = Wallet::where('user_id',$id)->delete();
		$invoice = Invoice::where('user_id',$id)->delete();
		$referalcode = ReferalCode::where('user_id',$id)->delete();
		$data = QueryUser::DeleteMembership('membership_account', $id);
		$data = QueryMembership::DeleteMembership('membership_account', $id);
		return $data;
	}

	public static function quickRandom($length = 16)
	{
		$pool = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
	}
}
