<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Venue;

class VenueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'id' => 1,
                'name' => 'B102',
        
            ],
            [
                'id' => 2,
                'name' => 'B202',
                
            ],
        ];
        foreach ($items as $item) {
            Venue::updateOrCreate($item);
        }
        // Faculty::factory()->count(10)->create();
    }
}
