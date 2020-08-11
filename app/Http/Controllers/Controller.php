<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	protected function flashGenericModal(Request &$request, $body = "", $title = 'Success')
	{
		$request->session()->flash('show-generic-modal', true);
		$request->session()->flash('generic-modal-title', $title);
		$request->session()->flash('generic-modal-body', $body);
	}

}
