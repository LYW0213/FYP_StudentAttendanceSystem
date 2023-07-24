<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Faculty;


class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::paginate(10); // Retrieve subjects from the database
        $faculties = Faculty::all(); // Retrieve faculties from the database
        return view('subjectlist', compact('subjects', 'faculties')); // Pass both variables to the view
    }

}
