<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Course extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = ['name', 'description', 'faculties_id'];


    public function student()
    {
        return $this->belongsTo(Student::class, 'courses_id');
    }
}
