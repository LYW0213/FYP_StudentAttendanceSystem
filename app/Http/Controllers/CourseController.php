<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Faculty;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::paginate(10);
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

        $newCourse = Course::create([
            'name' => $request->name,
            'faculties_id' => $request->faculty_id,
            'description' => $request->description
        ]);


        return redirect()->route('admin.programslist')->with('success', 'Program Added Successfully!');
    }

    public function edit(Request $request, Course $program)
    {

        $data = $request->validate([
            'name' => 'required|string',
            'faculty_id' => 'required|exists:faculties,id',
            'description' => 'nullable|string'
        ]);

        $program->name=$request->name;
        $program->faculties_id=$request->faculty_id;
        $program->description=$request->description;
        // $course->update($request->all());
        $program->save();

        return redirect()->route('admin.programslist')->with('success', 'Program Edited Successfully!');
    }


    public function destroy(Course $program)
    {
        $program->delete();

        return redirect()->route('admin.programslist')->with('success', 'Program Deleted Successfully!');
    }
}
