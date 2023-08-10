<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Subject;
use App\Models\Faculty;
use App\Models\Course;


class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::paginate(10); // Retrieve subjects from the database
        $faculties = Faculty::all(); // Retrieve faculties from the database
        $courses = Course::all(); // Retrieve faculties from the database
        return view('subjectlist', compact('subjects', 'faculties', 'courses')); // Pass both variables to the view
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'subjectCode' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    // Convert the subjectCode to uppercase
                    $uppercaseCode = strtoupper($value);
                    if ($value !== $uppercaseCode) {
                        $fail('The '.$attribute.' must be in capital letters.');
                    }
                },
            ],
            'subjectName' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    // Convert the subjectName to uppercase
                    $uppercaseName = strtoupper($value);
                    if ($value !== $uppercaseName) {
                        $fail('The '.$attribute.' must be in capital letters.');
                    }
                },
            ],
            'faculty_id' => 'required|exists:faculties,id',
            'course_id' => 'required|exists:courses,id',
            'users_id' => 'required',
        ]);

        $newSubject = Subject::create([
            'subjectCode' => $request->subjectCode,
            'subjectName' => $request->subjectName,
            'faculties_id' => $request->faculty_id,
            'courses_id' => $request->course_id,
            'users_id' => Auth::user()->id,
        ]);

        return redirect()->route('subjectlist')->with('success', 'Subject Added Successfully!');
    }


    public function edit(Request $request, Course $program)
    {

        $data = $request->validate([
            'name' => 'required|string',
            'faculty_id' => 'required|exists:faculties,id',
            'description' => 'nullable|string'
        ]);

        $program->name = $request->name;
        $program->faculties_id = $request->faculty_id;
        $program->description = $request->description;
        // $course->update($request->all());
        $program->save();

        return redirect()->route('subjectlist')->with('success', 'Program Edited Successfully!');
    }


    public function destroy(Subject $subject)
    {
        $subject->delete();

        return redirect()->route('subjectlist')->with('success', 'Program Deleted Successfully!');
    }
}
