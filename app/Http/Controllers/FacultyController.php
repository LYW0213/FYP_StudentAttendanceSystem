<?php

namespace App\Http\Controllers;

use App\Models\Faculty;


use Illuminate\Http\Request;

class FacultyController extends Controller
{

    public function index()
    {

        $faculties = Faculty::paginate(5);
        return view('admin.admin_facultylist', ['faculties' => $faculties]);

    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string'
        ]);

        $newFaculty = Faculty::create($data);

        return redirect()->route('admin.facultylist')->with('success', 'Faculty Added Successfully!');
    }

    public function edit(Faculty $faculty, Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable'
        ]);

        $faculty->update($data);
        return redirect()->route('admin.facultylist')->with('success', 'Faculty Edited Successfully!');
    }

    public function destroy(Faculty $faculty)
    {
        $faculty->delete();
        return redirect()->route('admin.facultylist')->with('success', 'Faculty Deleted Successfully!');
    }

}
