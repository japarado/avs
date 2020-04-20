<?php

use App\PollingStation;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PollingStationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		PollingStation::create([
			'name' => 'RM. 7D Buenventura Garcia Paredes O.P.',
			'auth_key' => Hash::make(env('POLLING_STATION_AUTH_KEY', 111)),
			'user_id' => User::where('role_id',config('constants.roles.admin'))->first()->id
		]);
    }
}
