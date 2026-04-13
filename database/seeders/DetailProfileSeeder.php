<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('detail_profile')->insert([
            'address' => 'Jember',
            'no_telp' => '08218726871',
            'ttl' => '2002-01-20',
            'photo' => 'default.jpg',
        ]);
    }
}
