<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\Role;
use App\Models\Course;
use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{

    public function Studentlist()
    {

        $users = User::all();
        return view('admin.admin_studentlist', compact('users'));

    } //End Method

    public function Student_create()
    {

        $faculties = Faculty::all();
        $courses = Course::all();
        return view('admin.admin_student_create', compact('faculties', 'courses'));

    } //End Method

    public function Student_store(Request $request)
    {

        $data = $request->validate([
            'image' => ['file', 'image', 'max:5120'],
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users,email',
            'gender' => [
                'required',
                Rule::in(['Male', 'Female']),
            ],
            'password' => 'required|string',
            'faculty_id' => 'required|exists:faculties,id',
            'studentId' => 'required|string|unique:students,studentId',
            'courses_id' => 'required|exists:courses,id',
        ]);

        $image = null;

        $newUser = User::create([
            'photo' => $image,
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'password' => Hash::make($request->password),
            'faculties_id' => $request->faculty_id,
            'roles_id' => 3,
        ]);

        $newStudent = Student::create([
            'users_id' => $newUser->id,
            'studentId' => $request->studentId,
            'courses_id' => $request->courses_id
        ]);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $this->createFolder($this->userimage);
            $original_file_name = $request->file('image')->getClientOriginalName();
            $file_name = $this->createUniqueFileName($newUser->id, $original_file_name);
            $request->file('image')->move($this->userimage, $file_name);

            $newUser->photo = $file_name;
            $newUser->save();
        }

        return redirect()->route('admin.studentlist')->with('success', 'User Added Successfully!');

    } //End Method

    public function Student_edit()
    {

        return view('admin.admin_student_edit');

    } //End Method


}
