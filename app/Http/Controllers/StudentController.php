<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\Imports\StudentImport;
use App\Section;
use App\User;
use Exception;
use Illuminate\Http\Request;
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

		Excel::import(new StudentImport, $spreadsheet_file);

        /* try */
        /* { */
        /* 	$spreadsheet_file = $request->file("student_import"); */
        /* 	Excel::import(new StudentImport, $spreadsheet_file); */
        /* } */
        /* catch(ValidationException $e) */
        /* { */
        /* 	$failures = $e->failures(); */
        /* 	foreach ($failures as $failure) */
        /* 	{ */
        /* 		$failure->row(); // row that went wrong */
        /* 		$failure->attribute(); // either heading key (if using heading row concern) or column index */
        /* 		$failure->errors(); // Actual error messages from Laravel validator */
        /* 		$failure->values(); // The values of the row that has failed. */
        /* 	} */
        /* } */
        

        $this->flashGenericModal($request, "Student Import Successful");
        return redirect()->back();
    }
}
