<?php
namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\User;
use App\Models\Role;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(5); // Retrieve users from the database
        $faculties = Faculty::all();
        return view('admin.admin_adminlecturerlist', compact('users', 'faculties'));
    }


    public function create()
    {
        $roles = Role::all();
        $faculties = Faculty::all();
        return view('admin.admin_adminlecturer_create')
            ->with('roles', $roles)
            ->with('faculties', $faculties);
    }

    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'confirmed'],
            'gender' => ['required', 'in:Male,Female'],
            'faculty' => ['required', 'exists:faculties,id'],
            'role' => ['required', 'exists:roles,id'],
        ]);

        // Create a new lecturer or admin record in the database
        $user = new User([
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'name' => $validatedData['name'],
            'gender' => $validatedData['gender'],
        ]);

        // Save the faculty and role for the new user
        $faculty = Faculty::findOrFail($validatedData['faculty']);
        $role = Role::findOrFail($validatedData['role']);

        $user->faculty()->associate($faculty);
        $user->role()->associate($role);

        $user->save();

        // Redirect back to the form with a success message
        return redirect()->back()->with('success', 'Created successfully!');
    }

    public function edit()
    {
        $roles = Role::all();
        $faculties = Faculty::all();
        return view('admin.admin_adminlecturer_create')
            ->with('roles', $roles)
            ->with('faculties', $faculties);
    }

    public function studentlist()
    {

        $users = User::with('student')->get(); // Eager load the student relationship
        return view('admin.admin_studentlist', compact('users'));
    }


    // Add other methods for creating, updating, and deleting users if needed...
}
