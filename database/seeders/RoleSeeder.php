<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            [
                'id' => 1,
                'name' => 'Admin'
            ],
            [
                'id' => 2,
                'name' => 'Lecturer'
            ],
            [
                'id' => 3,
                'name' => 'Student'
            ]
        ];
        foreach ($items as $item) {
            Role::updateOrCreate($item);
        }
    }
}
