<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('position')->insert(
            [
                [
                    'name' => 'President'
                ],
                [
                    'name' => 'Vice President'
                ],
                [
                    'name' => 'Internal Vice President'
                ],
                [
                    'name' => 'External Vice President'
                ],
                [
                    'name' => 'Secretary'
                ],
                [
                    'name' => 'Treasurer'
                ],
                [
                    'name' => 'Auditor'
                ],
                [
                    'name' => 'Public Relations Officer'
                ],
                [
                    'name' => 'Internal Public Relations Officer'
                ],
                [
                    'name' => 'External Public Relations Officer'
                ],
            ]
        );
    }
}
