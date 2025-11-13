<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Utilisateurs, identifaints et rôles
        $users = [
            [
                'email' => 'toto@mail.com',
                'name' => 'Toto Admin',
                'password' => 'totototo',
                'role' => 'admin'
            ],
            [
                'email' => 'titi@mail.com',
                'name' => 'Titi Planets',
                'password' => 'titititi',
                'role' => 'planets_admin'
            ],
            [
                'email' => 'tata@mail.com',
                'name' => 'Tata Crews',
                'password' => 'tatatata',
                'role' => 'crews_admin'
            ],
            [
                'email' => 'tutu@mail.com',
                'name' => 'Tutu Technologies',
                'password' => 'tutututu',
                'role' => 'technologies_admin'
            ]
        ];

        foreach ($users as $u) {
            $newUser = User::updateOrCreate(
                ['email' => $u['email']],
                [
                    'name' => $u['name'],
                    'password' => Hash::make($u['password']),
                    'email_verified_at' => now(),
                ]
            );
            $newUser->syncRoles($u['role']);
        }
    }
}
