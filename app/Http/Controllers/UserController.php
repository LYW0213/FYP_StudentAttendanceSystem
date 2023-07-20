<?php
namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\User;
use App\Models\Role;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all(); // Retrieve users from the database
        return view('admin.admin_adminlecturerlist', compact('users'));

    }

    public function create()
    {
        return view('admin.admin_adminlecturer_create')
            ->with('roles', Role::all())
            ->with('faculties', Faculty::all());

    }

    public function store (Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'confirmed'],
            'gender' => ['required', 'in:Male,Female'],
            'department' => ['required', 'integer', 'exists:departments,id'],
            'file' => ['file', 'image', 'max:5120'],
            'role' => [
                'array',
                'max:3'
            ],
            'role.*' => [
                'nullable',
                'integer',
                'distinct',
                'exists:roles,id'
            ]
        ]);

        $file_path = null;
        $file_name = null;

        $create_user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender_id' => $request->gender,
            'department_id' => $request->department,
            'avatar_file_path' => $file_path,
            'avatar_file_name' => $file_name,
        ]);

        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $this->createFolder($this->getAvatarPath());
            $original_file_name = $request->file('file')->getClientOriginalName();
            $file_name = $this->createUniqueFileName($create_user->id, $original_file_name);
            $request->file('file')->move($this->getAvatarPath(), $file_name);

            // $path = 'documents';
            // if (!File::exists($path)) {
            //     File::makeDirectory($path, 0777, true, true);
            // }
            // $path .= '/avatar';
            // if (!File::exists($path)) {
            //     File::makeDirectory($path, 0777, true, true);
            // }

            // $random_str = Str::random(32);
            // $time_now = Carbon::now();
            // $write_time = $time_now->format('YmdHis');
            // $original_file_name = $request->file('file')->getClientOriginalName();
            // $file_name = $random_str.'_'.$write_time.'_'.$create_user->id.'_'.$original_file_name;

            // $request->file('file')->move($path, $file_name);

            $create_user->avatar_file_path = $this->getAvatarPath();
            $create_user->avatar_file_name = $file_name;
            $create_user->save();
        }

        if (is_array($request->role) && count($request->role) > 0) {
            foreach ($request->role as $r) {
                if (!empty($r) && $r > 0) {
                    $create_user->user_roles()->create([
                        'role_id' => $r
                    ]);
                }
            }
        }
        return redirect()->route('users.show', ['user' => $create_user->id]);
    }


    public function studentlist()
    {

        $users = User::with('student')->get(); // Eager load the student relationship
        return view('admin.admin_studentlist', compact('users'));
    }


    // Add other methods for creating, updating, and deleting users if needed...
}
