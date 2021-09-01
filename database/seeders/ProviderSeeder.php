<?php

namespace Database\Seeders;

use App\Models\Provider;
use Illuminate\Database\Seeder;

class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Provider::create([
            'name' => 'provider name',
            'email' => 'provider@email.com',
            'user_name' => 'provider_1',
            'password' => bcrypt(123456)
        ]);

    }
}
