<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function dashboard()
    {
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

}
