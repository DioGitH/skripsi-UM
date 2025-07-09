<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('settings')->updateOrInsert(['key' => 'show_jelajahi_guru'], ['value' => '1']);
        DB::table('settings')->updateOrInsert(['key' => 'show_jelajahi_siswa'], ['value' => '1']);
    }
}
