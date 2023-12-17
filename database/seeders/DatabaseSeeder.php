<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        \App\Models\User::factory()->create();
        $this->call(JenisBahanSeeder::class);
        $this->call(BahanSeeder::class);
        $this->call(HargaSatuanAlatSeeder::class);
        $this->call(HargaSatuanPekerjaSeeder::class);
        \App\Models\Pemasok::factory(50)->create();
    }
}
