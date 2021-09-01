<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Location::create([
            'latitude' => 22.3,
            'longitude' => 43.3,
            'provider_id' => 1
        ]);
    }
}
