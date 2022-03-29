<?php

namespace Database\Seeders;

use App\Models\Club;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;

class ClubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Club::create([
            'club_name' => 'Multimedia',
            'hari' => 'Senin',
            'jam' => '15:00:00',
            'created_by' => 'Admin',
        ]);
    }
}
