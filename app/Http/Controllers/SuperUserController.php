<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuperUserController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		/* $admin = User::where('id', Auth::user()->id)->withkj */
		$context = [
			'admin' => User::where('id', Auth::user()->id)->with(['pollingStation' => function($query){
			}])->get()->first()
		];

		return view('superuser.index', $context);
	}

	public function registry()
	{
		return view('superuser.registry');
	}	

	public function settingsAuthorize()
	{
		return view('superuser.settings-authorize');
	}

	public function updatePassword(Request $request, $id)
	{

	}
}
