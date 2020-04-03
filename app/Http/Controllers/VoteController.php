<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\Position;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$context = [
			'positions' => Position::with('candidates.strand')->get()
		];

		return view('vote.create', $context);
		/* $candidates = Candidate::with('strand')->with('position')->get(); */
		/* $candidates_by_position = []; */

		/* foreach($candidates as $candidate) */
		/* { */ 
		/* 	if(array_key_exists($candidate->position->name, $candidates_by_position)) */
		/* 	{ */
		/* 		array_push($candidates_by_position[$candidate->position->name], $candidate); */
		/* 	} */
		/* 	else */ 
		/* 	{ */
		/* 		$candidates_by_position[$candidate->position->name] = [$candidate]; */
		/* 	} */
		/* } */

		/* $context = [ */
		/* 	'positions' => $candidates_by_position */
		/* ]; */        

		/* return view('vote.create', $context); */
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
