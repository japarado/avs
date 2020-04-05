<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperUserController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
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
}
