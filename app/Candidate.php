<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Position;
use App\Strand;

class Candidate extends Model
{
    protected $table = 'candidate';

    protected $fillable = [
        'name',
        'desc',
        'image',
        'position_id',
        'strand_id'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'candidate_user', 'candidate_id', 'user_id');
    }

	public function position() 
	{
		return $this->belongsTo(Position::class);
	}

	public function strand() 
	{
		return $this->belongsTo(Strand::class);
	}
}
