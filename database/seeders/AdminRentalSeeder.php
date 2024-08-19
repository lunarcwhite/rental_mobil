<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminRentalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Rental Sejahtera',
            'email' => 'rentalsejahtera@mail.com',
            'password' => bcrypt(12345678),
            'roleId' => 2
        ]);
    }
}
