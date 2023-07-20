<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'name',
    ];

    public function Attendance()
    {
        return $this->hasMany(Attendance::class, 'status_id');
    }
}
