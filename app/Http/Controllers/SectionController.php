<?php

namespace App\Http\Controllers;

use App\Section;
use App\Strand;
use Illuminate\Http\Request;

class SectionController extends Controller
{
	public function index()
	{
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
        Section::updateOrCreate([
            'level' => $request->input('level'),
            'strand_id' => $request->input('strand'),
            'number' => $request->input('number'),
        ]);

        return redirect()->back();
    }

    public function destroy(Request $request, $id = null)
    {
        Section::where('level', $request->input('level'))
            ->where('strand_id', $request->input('strand'))
            ->where('number', $request->input('number'))
            ->delete();

        return redirect()->back();
    }
}
