<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'id' => 1,
                'users_id' =>3,
                'studentId' => '235545-BSE',
                'courses_id'=>1,
            ],
            

        ];
        foreach ($items as $item) {
            Student::updateOrCreate($item);
        }
    }
}
