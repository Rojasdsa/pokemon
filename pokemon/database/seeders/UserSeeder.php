<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            User::create([
                'name' => 'Manu',
                'username' => 'Ash',
                'password' => bcrypt('manumanu'),
                'email' => 'ash@example.com',
                'email_verified_at' => now(),
            ]),

            User::create([
                'name' => 'Luis',
                'username' => 'Brock',
                'password' => bcrypt('luisluis'),
                'email' => 'brock@example.com',
                'email_verified_at' => now(),
            ]),

            User::create([
                'name' => 'Rafa',
                'username' => 'Misty',
                'password' => bcrypt('rafarafa'),
                'email' => 'misty@example.com',
                'email_verified_at' => now(),
            ]),
        ];
    }
}
