<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Subject extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'subjectCode',
        'subjectName',
        'users_id',
        'faculty_id',
        'courses_id',
    ];

    public function faculty()
    {
        return $this->belongsTo(Faculty::class, 'faculties_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }


}
