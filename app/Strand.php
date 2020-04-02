<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Section;
use App\User;

class Strand extends Model
{
    protected $table = 'strand';

    public function sections()
    {
        return $this->hasMany(Section::class);
    }
}
