<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $value = [
            [
                'id'        => 1,
                'location_code' => 'IIDA',
                'location_name'  => 'IIDA',
            ],
            // [
            //     'id'        => 2,
            //     'location_code' => 'PP',
            //     'location_name'  => 'PP',
            // ],
            // [
            //     'id'        => 3,
            //     'location_code' => 'EOL',
            //     'location_name'  => 'EOL',
            // ],
        ];

        foreach ($value as $item) {
            Location::updateOrCreate(
                ['id' => $item['id']],
                [
                    'location_code' => $item['location_code'],
                    'location_name'  => $item['location_name'],
                ]

            );
        }
    }
}
