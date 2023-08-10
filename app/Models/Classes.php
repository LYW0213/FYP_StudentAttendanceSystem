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
        'venue',
        'day',
        'start',
        'end',
        'qr_code',
        'subject_id',
    ];


    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'class_id');
    }
}
