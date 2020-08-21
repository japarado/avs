<?php

namespace App\Http\Controllers;

use App\Section;
use App\Strand;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index()
    {
        $context = [
            'sections' => Section::with('strand')
                ->orderby('level')
                ->orderby('strand_id')
                ->orderby('number')
                ->get()
        ];

        return view('section.index', $context);
    }

    public function create()
    {
        $context = [
            'strands' => Strand::all(),
        ];

        return view('section.create', $context);
    }

    public function store(Request $request)
    {
        $level = $request->input('level');
        $strand_id = $request->input('strand');
        $number = $request->input('number');

        $existing_section = Section::where('level', $level)
            ->where('strand_id', $strand_id)
            ->where('number', $number)
            ->get();

        if (!$existing_section->first()) {
            $section = new Section();
            $section->level = $level;
            $section->strand_id = $strand_id;
            $section->number = $number;
            $section->save();

			$this->flashGenericModal($request, "Level: {$level} | Strand: {$section->strand->name} | Number: {$number}");
        }
		else {
			$this->flashGenericModal($request, "Level: {$level} | Strand: {$existing_section->first()->strand->name} | Number: {$number} - Already Exists", 'Warning');
		}

        return redirect()->back();
    }

    public function destroy(Request $request, $id = null)
    {
        $section = Section::where('level', $request->input('level'))
            ->where('strand_id', $request->input('strand'))
            ->where('number', $request->input('number'))
			->with('strand')
            ->first();

		$modal_message = "";
		$modal_title = "";

		if($section)
		{
			$modal_message = "Level: {$section->level} | Strand: {$section->strand->name} | Number: {$section->number} - Deleted";
			$modal_title = "Success";
			$section->delete();
		}
		else 
		{
			$modal_message = "Level: {$request->input('level')} | Strand: {$request->input('strand')} | Number: {$request->input('number')} - Not Found";
			$modal_title = "Warning";
		}

		$this->flashGenericModal($request, $modal_message, $modal_title);

        return redirect()->back();
    }
}
