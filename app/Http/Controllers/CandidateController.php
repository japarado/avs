<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\Position;
use App\Strand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
			'positions' => Position::with(['candidates' => function($query) {
				$query->where('type', config('constants.candidatetypes.regular'))->withTrashed()->with('strand');
			}])->get()
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
		$image = $request->file('image');

		$candidate = Candidate::create([
			'name' => $request->input('name'),
			'desc' => $request->input('desc'),
			'image' => $request->input('image'),
			'position_id' => $request->input('position'),
			'strand_id' => $request->input('strand'),
		]);

		if($image)
		{
			$image_file_path = $request->file('image')->storeAs(
				"storage/candidates/$candidate->id", 
				$image->getClientOriginalName(),
				'public'
			);

			$candidate->image = $image_file_path;
			$candidate->save();
		}

		$this->flashGenericModal($request, "Candidate \"{$candidate->name}\" created");
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
			'candidate' => Candidate::where('id', $id)->withTrashed()->first(),
			'strands' => Strand::all(),
			'positions' => Position::all()
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

		$image = $request->file('image');

		$candidate = Candidate::find($id);
		$candidate->name = $request->input('name');
		$candidate->desc = $request->input('desc');
		$candidate->position_id = $request->input('position');
		$candidate->strand_id = $request->input('strand');

		if(($candidate->image && $image) || $image)
		{
			$image_file_path = $request->file('image')->storeAs(
				"candidates/$id", 
				$image->getClientOriginalName(),
				'public'
			);

			$candidate->image = $image_file_path;
		}

		$candidate->save();

		$this->flashGenericModal($request, "Candidate \"{$candidate->name}\" edited");
		return redirect()->back();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		Candidate::where('id', $id)->withTrashed()->forceDelete();
		Storage::disk('public')->deleteDirectory("candidates/$id");

		return redirect()->back();
	}

	public function hide($id)
	{
		$candidate = Candidate::where('id', $id)->withTrashed()->get()->first();
		if($candidate->trashed())
		{
			$candidate->restore();
		}
		else 
		{
			$candidate->delete();
		}
		return redirect()->back();
	}
}
