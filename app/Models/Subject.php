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
}
