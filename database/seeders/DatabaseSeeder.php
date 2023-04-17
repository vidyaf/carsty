<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'alamat' => 'sragen',
            'noHp' => '08111111111',
            'password' => bcrypt('admin123')
        ]);
        User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'role' => 'user',
            'alamat' => 'colomadu',
            'noHp' => '082222222',
            'password' => bcrypt('user123')
        ]);

        $this->call([
            CategorySeeder::class,
            ConditionSeeder::class
        ]);
    }
}
