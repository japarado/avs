<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Section;
use App\User;
use App\Candidate;

class Strand extends Model
{
    protected $table = 'strand';

    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    public function candidates()
    {
        return $this->hasMany(Candidate::class);
    }
}
