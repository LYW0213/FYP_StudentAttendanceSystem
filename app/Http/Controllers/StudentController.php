<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function StudentDashboard(){

        return view('dashboard');
    }

    public function Subjectlist(){

        return view('subjectlist');

    }//End Method

    public function Classeslist(){

        return view('classeslist');

    }//End Method

    public function Attendance(){

        return view('student.attendance');

    }//End Method
}
