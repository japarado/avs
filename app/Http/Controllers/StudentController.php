<?php

namespace App\Http\Controllers;

use App\Section;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
	public function index() 
	{
	}

	public function create()
	{
		$context = [
			'sections' => Section::with('strand')
				->orderby('section.level')
				->orderby('section.strand_id')
				->orderby('section.number')
				->get()
		];

		return view('student.create', $context);
	}

	public function store(Request $request)
	{
		User::updateOrCreate(
			[
				'email' => $request->input('student_number'),
			],
			[
				'email' => $request->input('student_number'),
				'name' => $request->input('name'),
				'password' => Hash::make($request->input('password')),
				'class_number' => $request->input('cn'),
				'section_id' => $request->input('section'),
				'role_id' => config('constants.roles.student')
			]
		);

		return redirect()->back();
	}
}
