<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Buku;
use Faker\Factory as Faker;

class BukuSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            Buku::create([
                'judul' => $faker->sentence(3),
                'penulis' => $faker->name,
                'harga' => $faker->numberBetween(10000, 50000),
                'tgl_terbit' => $faker->date(),
            ]);
        }
    }
}