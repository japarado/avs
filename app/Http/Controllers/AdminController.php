<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard() {
        $data = [
            'id'=> "2018-106296",
        ];

        return view('admin.dashboard')->with('data',$data);
    }
}
