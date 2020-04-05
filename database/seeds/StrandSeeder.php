<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('strand')->insert(
            [
                [
                    'name' => 'ABM',
                ],
                [
                    'name' => 'HUMSS',
                ],
                [
                    'name' => 'GAS-HA',
                ],
                [
                    'name' => 'STEM',
                ],
                [
                    'name' => 'PES',
                ],
                [
                    'name' => 'MAD',
                ],
            ]
        );
    }
}
