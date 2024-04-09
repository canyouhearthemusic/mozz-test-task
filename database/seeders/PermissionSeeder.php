<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'posts.create'])->assignRole('admin');
        Permission::create(['name' => 'posts.update'])->assignRole('admin', 'editor');
        Permission::create(['name' => 'posts.delete'])->assignRole('admin');
        Permission::create(['name' => 'posts.toggleVisibility'])->assignRole('admin', 'editor');
    }
}
