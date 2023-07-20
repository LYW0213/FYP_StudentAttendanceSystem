<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('admin.admin_programslist', compact('courses'));
    }


}
