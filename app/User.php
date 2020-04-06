<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Candidate;
use App\Section;
use App\Strand;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'student_number', 'class_number', 'role_id', 'section_id',  'auth_key', 'admin_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /* public function candidates() */
    /* { */
    /*     return $this->belongsToMany(Candidate::class, 'candidate_user', 'user_id', 'candidate_id'); */
    /* } */

    public function candidates()
    {
        return $this->belongsToMany(Candidate::class, 'vote')
              ->using(Vote::class)
              ->withPivot([
                  'created_at',
                  'updated_at'
              ]);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

	public function pollingStation()
	{
		return $this->hasOne(PollingStation::class);
	}
}
