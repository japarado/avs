<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
		$this->call([
			PositionSeeder::class,
			StrandSeeder::class,
			UserSeeder::class,
			CandidateSeeder::class,
			SectionSeeder::class
		]);
    }
}
