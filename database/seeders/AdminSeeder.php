<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'id' => '1',
            'nama_role' => 'admin'
        ]);
        
        User::create([
            'username' => 'admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('12345678'),
            'role_id' => 1
        ]);
    }
}
