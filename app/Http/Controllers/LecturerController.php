<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LecturerController extends Controller
{
    public function LecturerDashboard(){

        return view('dashboard');

    }

    public function Subjectlist(){

        return view('subjectlist');

    }//End Method

    public function Classeslist(){

        return view('classeslist');

    }//End Method

    public function Attendancelist(){

        return view('attendance_list');

    }//End Method
}
