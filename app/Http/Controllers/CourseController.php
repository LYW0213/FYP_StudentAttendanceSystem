<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Faculty;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::paginate(5);
        $faculties = Faculty::all(); // Fetch all faculties from the database

        return view('admin.admin_programslist', compact('courses', 'faculties'));
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'faculty_id' => 'required|exists:faculties,id',
            'description' => 'nullable|string'
        ]);

        $newCourse = Course::create($data);


        return redirect()->route('admin.programslist')->with('success', 'Program Added Successfully!');
    }

    public function edit(Course $course, Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'faculty_id' => 'required|exists:faculties,id',
            'description' => 'nullable|string'
        ]);

        $course->update($data);
        return redirect()->route('admin.programslist')->with('success', 'Program Edited Successfully!');
    }


    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('admin.programslist')->with('success', 'Program Deleted Successfully!');
    }
}
