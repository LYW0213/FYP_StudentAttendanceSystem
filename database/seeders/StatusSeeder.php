<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'id' => 1,
                'name' => 'Present'
            ],
            [
                'id' => 2,
                'name' => 'Absent'
            ],
            [
                'id' => 3,
                'name' => 'Late'
            ],
        ];
        foreach ($items as $item) {
            Status::updateOrCreate($item);
        }
    }
}
