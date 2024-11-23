<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Peran;

class PeranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Peran::insert([
            ['nama_peran' => 'Admin Besar'],
            ['nama_peran' => 'Admin Kecil'],
        ]);
    }
}
