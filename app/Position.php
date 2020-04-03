<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Candidate;

class Position extends Model
{
    protected $table = 'position';

    protected $fillable = [
        'name',
        'desc'
    ];

	public function candidate() 
	{
		return $this->hasMany(Candidate::class);
	}
}
