<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'name',
        'day',
        'start',
        'end',
        'faculty_id',
        'courses_id',
        'venue_id',
        'subjects_id',
    ];

    
}
