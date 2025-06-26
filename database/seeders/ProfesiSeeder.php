<?php

namespace Database\Seeders;

use App\Models\Profesi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfesiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        Profesi::create([
            'nama' => 'Guru'
        ]);
        Profesi::create([
            'nama' => 'Siswa'
        ]);
    }
}
