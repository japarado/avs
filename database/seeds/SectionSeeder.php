<?php

use App\Section;
use App\Strand;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $strands = Strand::all();
        $levels = [11, 12];
        $section_numbers = [1,2,3];

		$sections = [];

		foreach($strands as $strand) 
		{
			foreach($levels as $level) 
			{
				foreach($section_numbers as $section_number)
				{
					$section = [
						'level' => $level,
						'strand_id' => $strand->id,
						'number' => $section_number
					];

					array_push($sections, $section);
				}
			}
		}

		Section::insert($sections);
    }
}
