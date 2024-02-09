<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

         User::factory()->create([
             'name' => 'admin',
             'email' => 'admin@gmail.com',
             'password'=>Hash::make('1234'),
             'is_admin'=>1,
         ]);
        User::factory()->create([
            'name' => 'patrik',
            'email' => 'patrik@gmail.com',
            'password'=>Hash::make('123'),
            'is_admin'=>0,
        ]);
        User::factory()->create([
            'name' => 'marcel',
            'email' => 'marcel@gmail.com',
            'password'=>Hash::make('123'),
            'is_admin'=>0,
        ]);
        User::factory()->create([
            'name' => 'stano',
            'email' => 'stano@gmail.com',
            'password'=>Hash::make('123'),
            'is_admin'=>0,
        ]);
    }
}
