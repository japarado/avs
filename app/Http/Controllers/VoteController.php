<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\PollingStation;
use App\Position;
use App\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
use Illuminate\Support\Carbon;

class VoteController extends Controller
{
	public function index()
	{
		$positions = Position::with(['candidates' => function($query) {
			$query->with('strand')->withCount('users as votes')->orderBy('votes', 'desc');
		}])->get();

		foreach($positions as $position)
		{
			$position->total_votes = 0;
			foreach($position->candidates as $candidate)
			{
				$position->total_votes += $candidate->votes;
			}
		}

		$context = [
			'positions' => $positions
		];

		return view('vote.index', $context);
	}

	public function instructions()
    {
		$context = [
			'instructions' => PollingStation::first()->instructions
		];
        return view('vote.instructions', $context);
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

	public function download()
	{

		$sections = Section::with('strand')
			->with(['students' => function($query){
				$query->withCount('candidates as votes');
			}])
			->withCount('students as population')
			->get();

		foreach($sections as $section)
		{
			$voted_count = 0;
			foreach($section->students as $student)
			{
				if($student->votes > 0)
				{
					$voted_count++;
				}
			}
			$section->voted_count = $voted_count;
			$section->no_vote_count = count($section->students) - $voted_count;
			/* $section->vote_percentage = $section->no_vote_count === 0 ? 100 : $voted_count / count($section->students); */
			$section->vote_percentage = count($section->students) > 0 ? $section->voted_count / count($section->students) : 0;
		}

		$context = [
			'positions' => Position::with(['candidates' => function($query) {
				$query->with('strand')->withCount('users as votes')->orderBy('votes', 'desc');
			}])->get(),
			'sections' => $sections,
			'polling_station' => PollingStation::first(),
			'date' => Carbon::now()->isoFormat('MMMM Do, YYYY'),
		];

		return PDF::loadView('vote.results-doc', $context)->stream(now() . "-RESULTS-IURIS");
		/* PDF::loadView('vote.results-doc', $context)->storeAs('storage/documents/', 'results.pdf', 'public'); */

		return view('vote.results-doc', $context);
	}
}
