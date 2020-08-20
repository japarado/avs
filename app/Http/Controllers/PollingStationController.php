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
			$request->session()->flash('polling-station-auth', true);

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

			$this->flashGenericModal($request, "Polling station name udpated", "Success");
		}
		else 
		{
			$this->flashGenericModal($request, "Polling station name unchanged", "Warning");
		}

		return redirect()->back();
	}

	public function updateAdminId(Request $request, $id)
	{
		$user = User::find($id);

		if(!$user || $user->email === $request->input('new_id'))
		{
			$this->flashGenericModal($request, 'Admin ID Unchanged', 'Warning');
			return redirect()->back();
		}
		else 
		{
			$user->email = $request->input('new_id');
			$user->save();

			$this->flashGenericModal($request, 'Admin ID updated succesfully', 'Success');
			return redirect()->back();
			/* return redirect()->route('login'); */
		}
	}
	
	public function updateAdminPassword(Request $request, $id)
	{
		$user = User::find($id);

		if(!$user)
		{
			$this->flashGenericModal($request, "User not found", "Error");
		}
		else if(!Hash::check($request->input('current_password'), $user->password)) 
		{
			$this->flashGenericModal($request, "Password Incorrect", "Error");
		}
		else if($request->input('new_password') !== $request->input('confirm_password'))
		{
			$this->flashGenericModal($request, "Passwords do not match", "Error");
		}
		elseif (Hash::check($request->input('new_password'), $user->password)) 
		{
			$this->flashGenericModal($request, "Password unchanged", "Warning");
		}
		else 
		{
			$user->password = Hash::make($request->input('new_password'));
			$user->save();
			$this->flashGenericModal($request, "Password upated", "Success");
		}
		return redirect()->back();
	}

	public function updateInstructions(Request $request)
	{
		$instructions = $request->input('instructions');
		PollingStation::where('user_id', Auth::user()->id)
			->update(['instructions' => $instructions]);
		$this->flashGenericModal($request, "Instructions saved", "Success");
		return redirect()->back();
	}
}
