<?php

use App\Candidate;
use App\Position;
use App\Strand;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class CandidateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$positions = Position::all();
		$strands = Strand::all();
		$candidates = [];

		foreach($positions as $position) 
		{
			for($ctr = 0; $ctr < 3; $ctr++)
			{
				$count_value = $ctr + 1;

				$candidate = new Candidate();
				$candidate->name = "$position->name $count_value";
				$candidate->position_id = $position->id;
				$candidate->strand_id = Arr::random($strands->toArray())['id'];
				$candidate->save();
			}
		}
    }
}
