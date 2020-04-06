<?php

namespace App\Http\Controllers;

use App\PollingStation;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PollingStationController extends Controller
{
	public function authpage()
	{
		return view('pollingstation.authpage');
	}

	public function auth(Request $request)
	{
		$polling_station = PollingStation::first();

		if(Hash::check($request->input('auth_key'), $polling_station->auth_key))
		{
			return redirect()->action('PollingStationController@edit');
		}
		else 
		{
			return redirect()->back()->with([
				'show-auth-key-settings-modal' => true
			]);
		}
	}

	public function edit()
	{
		$user = User::where('id', Auth::user()->id)->with('pollingStation')->get()->first();

		$context = [
			'user' => $user,
		];


		return view('pollingstation.edit', $context);
	}

	public function updateName(Request $request, $id)
	{
	}
	
	public function updateUserPassword()
	{

	}
}
