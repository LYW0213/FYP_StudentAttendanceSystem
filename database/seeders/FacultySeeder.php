<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Faculty;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'id' => 1,
                'name' => 'FICT',
                'description' => 'Faculty of
                Computer Science and Information Computing Technology'
            ],
            [
                'id' => 2,
                'name' => 'FAME',
                'description' => 'Faculty of
                Accountancy, Management and Economics'
            ],
        ];
        foreach ($items as $item) {
            Faculty::updateOrCreate($item);
        }
        // Faculty::factory()->count(10)->create();
    }
}
