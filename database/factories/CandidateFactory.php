<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Candidate;
use App\Model;
use App\Position;
use Faker\Generator as Faker;

$factory->define(Candidate::class, function (Faker $faker) {
	$positions = Position::all();
	return [
		'name' => $faker->name,
		'desc' => $faker->paragraph(3),
		'position_id' => $positions[array_rand($positions)]
	];
});
