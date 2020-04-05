<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
	public function authpage()
	{
		return view('setting.authpage');
	}

	public function auth(Request $request)
	{
		return redirect()->back()->with([
			'show-auth-key-settings-modal' => true
		]);
	}
}
