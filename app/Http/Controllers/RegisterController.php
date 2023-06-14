<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request){

        $validated = $request->validate([
            'email' => 'required|string|unique:users,email',
            'password' => 'required|min:8',
            'name' => 'required|string',
            'gender' =>[
                'required',
                Rule::in(['Male', 'Female']),
            ],
            'roles_id'=> 'required|integer|exists:roles,id',
            'faculties_id' =>'required|integer|exists:faculties,id',
            'photo' => 'nullable|string',
        ]);

        $newuser = new User();
        $newuser->email = $request->email;
        $newuser->password = Hash::make($request->password);
        $newuser->name = $request->name;
        $newuser->gender = $request->gender;
        $newuser->roles_id = $request->roles_id;
        $newuser->faculties_id = $request->faculties_id;
        $newuser->photo = $request->photo; //change to path
        // Set values for other attributes
        $newuser->save();

        //return view[page] (after create new user) 

    }
}
