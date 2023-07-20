<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;


class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::all(); // Retrieve faculties from the database
        return view('subjectlist', compact('subjects'));
    }
}
