<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [   //admin
                'id' => 1,
                'email' => 'admin@newera.edu.my',
                'name' => 'Admin',
                'password' => Hash::make('111'),
                'gender' => 'Female',
                'roles_id' => 1,
                'faculties_id' => 1,
                'photo' => null,
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
            ],
            [   //lecturer
                'id' => 2,
                'email' => 'lecturer@newera.edu.my',
                'name' => 'Lecturer',
                'password' => Hash::make('111'),
                'gender' => 'Male',
                'roles_id' => 2,
                'faculties_id' => 2,
                'photo' => null,
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
            ],
            [   //student
                'id' => 3,
                'email' => 'student@newera.edu.my',
                'name' => 'Student',
                'password' => Hash::make('111'),
                'gender' => 'Male',
                'roles_id' => 3,
                'faculties_id' => 1,
                'photo' => null,
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
            ]
        ];
        foreach ($items as $item) {
            User::updateOrCreate($item);
        }
        

        // User::factory()->count(50)->create(); // Fake data for testing
    }
}

