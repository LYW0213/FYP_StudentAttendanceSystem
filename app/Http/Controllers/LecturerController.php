<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Classes;

class LecturerController extends Controller
{
    public function LecturerDashboard(){

        $classes = Classes::all(); // Retrieve class data from the model

        $activeClassesCount = 0; // Initialize the count of active classes

        foreach ($classes as $class) {
            $starttime = Carbon::createFromFormat('Y-m-d H:i:s', $class->day . ' ' . $class->start, '+08:00');
            $endtime = Carbon::createFromFormat('Y-m-d H:i:s', $class->day . ' ' . $class->end, '+08:00');

            if (now() >= $starttime && now() <= $endtime) {
                $activeClassesCount++;
            }
        }

        return view('dashboard', compact('activeClassesCount'));

    }

    public function Attendancelist(){

        return view('attendance_list');

    }//End Method
}
