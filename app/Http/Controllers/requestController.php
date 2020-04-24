<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class requestController extends Controller
{

	public function main(Request $request)
	{
		return view('pages.request', ['role_id' => session('role_id')]);
	}

	public function loadRequests()
	{
		$requests = DB::table('requests')
						->leftjoin('request_category', 'request_category.id', 'requests.category_id')
						->leftjoin('departaments', 'departaments.id', 'requests.departament_id')
						->select('requests.*', 'request_category.name as category_name', 'departaments.name as otdel')
						->orderby('requests.id', 'DESC')
						->get();
		return view('pages.ajax.mainListRequests', ['requests' => $requests]);
	}

	public function newRequest (Request $request)
	{
		$category		= DB::table('request_category')->orderby('name', 'ASC')->get();
		$departaments	= DB::table('departaments')->orderby('name', 'ASC')->get();
		return view('pages.newRequest', ['role_id' => session('role_id'), 'category' => $category, 'departaments' => $departaments]);
	}

	public function saveRequest(Request $request)
	{
		$category 		= htmlspecialchars(trim($request->category));
		$departament 	= htmlspecialchars(trim($request->departament));
		$status 		= htmlspecialchars(trim($request->status));
		$theme 			= htmlspecialchars(trim($request->theme));
		$comment 		= htmlspecialchars(trim($request->comment));
		
		$rid			= htmlspecialchars(trim($request->rid));
		if ($rid == null)
		{
			$rid = DB::table('requests')->insertGetId(
						[
							'user_id'			=> session("user_id"),
							'departament_id'	=> $departament,
							'category_id'		=> $category,
							'title'				=> $theme,
							'comments'			=> $comment,
							'status'			=> $status
						]
					);
			DB::table('request_history')->insert(['request_id' => $rid, 'status' => $status, 'comment' => 'новая заявка']);
		}
		else
		{
			DB::table('requests')->where('id', $rid)->update([
				'departament_id'	=> $departament,
				'category_id'		=> $category,
				'title'				=> $theme,
				'comments'			=> $comment,
				'status'			=> $status
			]);
			switch ($status) {
				case 'Новая':
					$comment = 'новая заявка';
					break;
				case 'Открытая':
					$comment = 'открытая заявка';
					break;
				case 'Закрытая':
					$comment = 'закрытая заявка';
					break;
			}
			DB::table('request_history')->insert(['request_id' => $rid, 'status' => $status, 'comment' => $comment]);
		}
		return redirect('/request');
	}

	public function openRequest (Request $request)
	{
		$category		= DB::table('request_category')->orderby('name', 'ASC')->get();
		$departaments	= DB::table('departaments')->orderby('name', 'ASC')->get();
		$req			= DB::table('requests')->where('id', $request->rid)->first();
		return view('pages.newRequest', ['role_id' => session('role_id'), 'category' => $category, 'departaments' => $departaments, 'request' => $req]);
	}
}
