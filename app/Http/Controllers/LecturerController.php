<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LecturerController extends Controller
{
    public function LecturerDashboard(){

        return view('lecturer.lecturer_dashboard');
        
    }
}
