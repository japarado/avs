<?php

namespace App\Http\Controllers;

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
	}

	public function overview(Request $request) 
	{
		$position_ids = [];
		$candidate_ids = [];

		foreach($request->except('_token') as $key => $value)
		{
			array_push($position_ids, $key);
			array_push($candidate_ids, $value);
		}

		$unused_positions = Position::whereNotIn('id', $position_ids)->get();

		if(count($unused_positions) > 0 )
		{
			$unused_position_names = $unused_positions->implode('name', ', ');
			return redirect()
				->back()
				->with([
					'show-vote-modal' => true,
					'unused_position_names' => $unused_position_names
				])
				->withInput($request->all());
		}
		else
		{
			$positions = Position::whereIn('id', $position_ids)
				->with(['candidates' => function($query) use($candidate_ids) {
					$query->whereIn('id', $candidate_ids);
				}])
				->get();
			$context = [
				'positions' => $positions
			];

			return view('vote.overview', $context);
		}
	}

	public function restart()
	{
		return redirect()->action('VoteController@create')->with('show-vote-prompt', true);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
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

	// Helper functions
	private static function getUnusedPositionNames($positions)
	{
		$unused_position_names = [];

		foreach($positions->toArray() as $position)
		{
			if(count($position['candidates']) === 0)
			{
				array_push($unused_position_names, $position['name']);
			}
		}

		return $unused_position_names;
	}
}
