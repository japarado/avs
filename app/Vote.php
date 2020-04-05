<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Vote extends Pivot
{
	protected $table = 'vote';

	protected $primaryKey = ['user_id', 'candidate_id'];
}
