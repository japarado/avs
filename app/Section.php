<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Strand;
use App\User;

class Section extends Model
{
    protected $table = 'section';

    protected $fillable = [
        'number',
        'level',
        'strand_id'
    ];

    public function strand()
    {
        return $this->belongsTo(Strand::class);
    }

    public function students()
    {
        return $this->hasMany(User::class);
    }
}
