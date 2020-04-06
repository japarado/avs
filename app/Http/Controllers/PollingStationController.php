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

	public function update(Request $request, $id)
	{
		$user = Auth::user();
		$polling_station = PollingStation::where('user_id', $id)->where('id', $id)->first();

		$new_polling_station_name = $request->input('name');

		if($polling_station && $polling_station->name !== $new_polling_station_name)
		{
			$polling_station->name = $new_polling_station_name;
			$polling_station->save();
			Auth::logout();
			return redirect()->route('login');
		}
		else 
		{
			return redirect()->back();
		}
	}

	public function updateAdminId(Request $request, $id)
	{
		$user = User::find($id);

		if(!$user || $user->email === $request->input('new_id'))
		{
			return redirect()->back();
		}
		else 
		{
			$user->email = $request->input('new_id');
			$user->save();

			Auth::logout();
			return redirect()->route('login');
		}
	}
	
	public function updateAdminPassword(Request $request, $id)
	{
		$user = User::find($id);

		if(!$user || $request->input('new_password') !== $request->input('confirm_password') || Hash::check($request->input('new_password'), $user->password))
		{
			return redirect()->back();
		}
		else 
		{
			$user->password = Hash::make($request->input('new_password'));
			$user->save();
			Auth::logout();

			return redirect()->route('login');
		}
	}
}
