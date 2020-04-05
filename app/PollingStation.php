<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PollingStation extends Model
{
	protected $table = 'polling_station';

	protected $fillable = ['name',  'user_id', 'auth_key'];
}
