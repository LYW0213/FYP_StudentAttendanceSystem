<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'id' => 1,
                'name' => 'BSE',
                'description' => 'Bachelor of Computer Science (Hons) in Software Engineering',
                'faculties_id' => 1
            ],
            [
                'id' => 2,
                'name' => 'BNT',
                'description' => 'Bachelor of Computer Science (Hons) in Network Technology',
                'faculties_id' => 1
            ],
            [
                'id' => 3,
                'name' => 'BCS',
                'description' => 'Bachelor in Information Technology (Cyber Security) with Honours',
                'faculties_id' => 1
            ],
            [
                'id' => 4,
                'name' => 'BAA',
                'description' => 'Bachelor of Arts (Honours) in Business Administration',
                'faculties_id' => 2
            ],
            [
                'id' => 5,
                'name' => 'BIM',
                'description' => 'Bachelor of Business in Marketing (Honours)',
                'faculties_id' => 2
            ],
        ];
        foreach ($items as $item) {
            Course::updateOrCreate($item);
        }
        // Course::factory()->count(10)->create();
    }
}
