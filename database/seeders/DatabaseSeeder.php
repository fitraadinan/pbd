<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\ClubSeeder;
use Database\Seeders\UserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            ClubSeeder::class
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
