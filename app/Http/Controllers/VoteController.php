<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoteController extends Controller
{
	public function index()
	{
		$context = [
			'positions' => Position::with(['candidates' => function($query) {
				$query->with('strand')->withCount('users as votes')->orderBy('votes', 'desc');
			}])
				->get()
		];

		return view('vote.index', $context);
	}

	public function instructions()
    {
        return view('vote.instructions');
    }

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

	public function store(Request $request)
	{
		$position_ids = [];
		$candidate_ids = [];

		foreach($request->except('_token') as $key => $value)
		{
			array_push($position_ids, $key);
			array_push($candidate_ids, $value);
		}

		$unused_positions = Position::whereNotIn('id', $position_ids)->get();

		if(count($unused_positions) > 0)
		{
			$unused_position_names = $unused_positions->implode('name', ', ');
			return redirect()
				->action('VoteController@create')
				->with([
					'show-vote-modal' => true,
					'unused_position_names' => $unused_position_names
				]);
		}
		else
		{
			$candidates = Candidate::whereIn('id', $candidate_ids)->get();

			Auth::user()->candidates()->detach();
			Auth::user()->candidates()->attach($candidates);

			return redirect()->action('PageController@logout');
		}
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
