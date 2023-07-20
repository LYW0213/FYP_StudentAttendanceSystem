<?php

namespace App\Http\Controllers;
use App\Models\Faculty;

use Illuminate\Http\Request;

class FacultyController extends Controller
{
    public function index()
    {
        $faculties = Faculty::all(); // Retrieve faculties from the database
        return view('admin.admin_facultylist', compact('faculties'));
    }

}
