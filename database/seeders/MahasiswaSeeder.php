<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mahasiswa::create([
            'nama' => 'Fitra Adina Nuzulia',
            'nim' => '21120119140130',
            'th_masuk' => '2019',
            'no_telepon' => '0816662367',
            'club_id' => '1',
        ]);
    }
}
