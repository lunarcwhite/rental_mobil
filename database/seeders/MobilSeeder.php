<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mobil;
use App\Models\ProfileRental;
use Faker\Factory as faker;

class MobilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        for ($i=0; $i < 100; $i++) { 
            $data = [
                'namaMobil' => 'Mobil-' . $i,
                'jumlahKursi' => rand(3, 8),
                'harga' => $faker->randomElement([100000, 150000, 200000, 250000, 300000]),
                'gigi' => $faker->randomElement(['Manual', 'Matic']),
                'bahanBakar' => $faker->randomElement(['Bensin', 'Solar']),
                'statusPersetujuan' => 1,
                'gambar' => 'test',
                'deskripsi' => 'test-' . $i,
                'profileRentalId' => ProfileRental::inRandomOrder()->pluck('id')->first(),
                'platMobil' => 'F 3' . $i + 1 . ' AA',
            ];

            Mobil::create($data);
        }
    }
}
