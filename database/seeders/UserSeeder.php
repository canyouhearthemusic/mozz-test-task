<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Иван Иванов Иванович',
            'email' => 'admin@example.com',
            'password' => Hash::make('pass1234'),
        ])->assignRole('admin');

        User::factory()->create([
            'name' => 'Петр Петров Петрович',
            'email' => 'editor@example.com',
            'password' => Hash::make('pass1234'),
        ])->assignRole('editor');

        User::factory()->create([
            'name' => 'Михаил Михаилов Михаилович',
            'email' => 'regular@example.com',
            'password' => Hash::make('pass1234'),
        ])->assignRole('regular');
    }
}
