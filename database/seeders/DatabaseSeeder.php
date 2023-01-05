<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'moarugg@gmail.com',
            'password' => Hash::make('isylzjko'),
            'verify' => 1,
            'register' => 1,
            'active' => 1,
        ]);
    }
}
