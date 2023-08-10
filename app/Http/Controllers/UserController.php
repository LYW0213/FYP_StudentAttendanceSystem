<?php
namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\User;
use App\Models\Role;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;


class UserController extends Controller
{
    public function adminlecturer_index()
    {
        $users = User::paginate(10);
        return view('admin.admin_adminlecturerlist', compact('users'));

    }

    public function Adminlecturer_create()
    {
        $faculties = Faculty::all();
        $roles = Role::whereNot('id', 3)->get();
        return view('admin.admin_adminlecturer_create', compact('faculties', 'roles'));

    } //End Method


    public function Adminlecturer_store(Request $request)
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
            'role_id' => 'required|exists:roles,id',
        ]);

        $image = null;

        $newUser = User::create([
            'photo' => $image,
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'password' => Hash::make($request->password),
            'faculties_id' => $request->faculty_id,
            'roles_id' => $request->role_id,

        ]);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $this->createFolder($this->userimage);
            $original_file_name = $request->file('image')->getClientOriginalName();
            $file_name = $this->createUniqueFileName($newUser->id, $original_file_name);
            $request->file('image')->move($this->userimage, $file_name);

            $newUser->photo = $file_name;
            $newUser->save();
        }

        return redirect()->route('admin.adminlecturerlist')->with('success', 'User Added Successfully!');

    } //End Method


    public function profile(User $user)
    {
        $users = User::all();
        return view('profile', compact('user','users'));
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.adminlecturerlist')->with('success', 'User Deleted Successfully!');
    }
}
