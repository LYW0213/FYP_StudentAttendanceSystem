<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class AdminController extends Controller
{
    public function AdminDashboard()
    {

        return view('dashboard');

    } //End Method

    public function Studentlist()
    {

        return view('admin.admin_studentlist');

    } //End Method

    public function Student_create()
    {

        return view('admin.admin_student_create');

    } //End Method

    public function Student_edit()
    {

        return view('admin.admin_student_edit');

    } //End Method

    public function Subjectlist()
    {

        return view('subjectlist');

    } //End Method

    public function Classeslist()
    {

        return view('classeslist');

    } //End Method

    public function Attendancelist()
    {

        return view('attendance_list');

    } //End Method
}
