<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('position')->insert([
			[
				'name' => 'President',
				'desc' => 'University president'
			],
			[
				'name' => 'Vice President',
				'desc' => 'Supporting role for president'
			],
			[
				'name' => 'AIC',
				'desc' => 'Accounting matters'
			],
			[
				'name' => 'Secretary',
				'desc' => 'Documentation manager and resolver'
			]
		]);
    }
}
