<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\Imports\StudentImport;
use App\Section;
use App\User;
use Exception; use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Validators\ValidationException;

class StudentController extends Controller
{
    public function index()
    {
        $context = [
            'sections' => Section::with('strand')
                ->with(['students' => function ($query) {
                    $query->orderby('class_number')->where('role_id', config('constants.roles.student'))->with('candidates');
                }])
                ->orderby('section.level')
                ->orderby('section.strand_id')
                ->orderby('section.number')
                ->get()
        ];

        return view('student.index', $context);
    }

    public function create()
    {
        $context = [
            'sections' => Section::with('strand')
                ->orderby('section.level')
                ->orderby('section.strand_id')
                ->orderby('section.number')
                ->get(),
            'students' => User::where('role_id', config('constants.roles.student'))->select('email')->get()
        ];

        return view('student.create', $context);
    }

    public function store(Request $request)
    {
        User::updateOrCreate(
            [
                'email' => $request->input('student_number'),
                'role_id' => config('constants.roles.student')
            ],
            [
                'name' => $request->input('name'),
                'password' => Hash::make($request->input('password')),
                'class_number' => $request->input('cn'),
                'section_id' => $request->input('section'),
                'role_id' => config('constants.roles.student')
            ]
        );

        $this->flashGenericModal($request, 'Student created');
        return redirect()->back();
    }

    public function destroy(Request $request, $id = null)
    {
        User::where('email', $request->input('student_number'))
            ->where('role_id', config('constants.roles.student'))
            ->delete();

        $this->flashGenericModal($request, "Student deleted");
        return redirect()->back();
    }

    public function import(Request $request)
    {
        $spreadsheet_file = $request->file("student_import");
		$modal_title = '';
		$modal_message = '';

		try 
		{
			Excel::import(new StudentImport, $spreadsheet_file);
			$modal_title = 'Success';
			$modal_message = "Student import succesful";
		}
		catch (ValidationException $e)
	   	{
			$failures = $e->failures();
			$whole_failure_message = '';
			$ctr = 1;
			foreach ($failures as $failure) 
			{
				$consolidated_error_message = self::errorArrayToString($failure->errors());
				$single_failure_message = "{$ctr}. Row: {$failure->row()}. Column: {$failure->attribute()}. \n Error Message: {$consolidated_error_message} \r\n";
				$whole_failure_message .= $single_failure_message;
				$ctr++;
			}
			$modal_title = "Failure";
			$modal_message = $whole_failure_message;
		}
        

        $this->flashGenericModal($request, $modal_message, $modal_title);
        return redirect()->back();
    }

	private static function errorArrayToString(array $errors): string 
	{
		$main_error_message = '';
		foreach($errors as $error)
		{
			$main_error_message .= "{$error} \n";
		}
		return $main_error_message;
	}
}
