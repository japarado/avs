<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Position;
use App\Strand;
use Illuminate\Database\Eloquent\SoftDeletes;

class Candidate extends Model
{
	use SoftDeletes;

    protected $table = 'candidate';

    protected $fillable = [
        'name',
        'desc',
        'image',
		'type',
        'position_id',
        'strand_id'
    ];

    /* public function users() */
    /* { */
    /*     return $this->belongsToMany(User::class, 'candidate_user', 'candidate_id', 'user_id'); */
    /* } */

    public function users()
    {
        return $this->belongsToMany(User::class, 'vote')
              ->using(Vote::class)
              ->withPivot([
                  'created_at',
                  'updated_at'
              ]);
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
