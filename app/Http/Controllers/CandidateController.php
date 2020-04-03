<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\Position;
use App\Strand;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $context = [
            'candidates' => Candidate::with('strand')->with('position')->get()
        ];

        return view('candidate.index', $context);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $context = [
            'strands' => Strand::all(),
            'positions' => Position::all(),
        ];

        return view('candidate.create', $context);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $candidate = Candidate::create([
            'name' => $request->input('name'),
            'desc' => $request->input('desc'),
            'image' => $request->input('image'),
			'type' => config('constants.candidatetypes.regular'),
            'position_id' => $request->input('position_id'),
            'strand_id' => $request->input('strand_id'),
        ]);

        /* return redirect()->action('CandidateController@edit', ['id' => $candidate->id]); */
        return redirect()->route('candidates.edit', ['id' => $candidate->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $context = [
            'candidate' => Candidate::find($id),
            'strands' => Strand::all(),
            'positions' => Position::all(),
        ];

        return view('candidate.edit', $context);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $candidate = Candidate::find($id);
        $candidate->name = $request->input('name');
        $candidate->desc = $request->input('desc');
        $candidate->position_id = $request->input('position');
        $candidate->strand_id = $request->input('strand');
        $candidate->save();

        return redirect()->back();
        /* return redirect()->action('CandidateController@create'); */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Candidate::destroy($id);
        return redirect()->back();
    }
}
