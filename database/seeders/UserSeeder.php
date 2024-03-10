<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username' => 'admin',
            'email' => 'admin@app.local',
            'email_verified_at' => now(),
            'password' => Hash::make('12qwaszx'),
            'is_admin' => 1,
            'remember_token' => Str::random(10),
        ]);
        User::factory()->count(15)->create();
    }
}
