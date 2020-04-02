<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Candidate extends Model
{
	protected $table = 'candidate';

	public function users() {
		return $this->belongsToMany(User::class, 'candidate_user', 'candidate_id', 'user_id');
	}
}
