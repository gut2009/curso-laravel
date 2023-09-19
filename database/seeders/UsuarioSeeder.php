<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsuarioSeeder extends Seeder
{

    public function run(): void
    {
        User::create(
            [
                'name' => "Gut",
                'email' => "teste@teste.com",
                'password' => Hash::make('12345678'),
            ]
        );
    }
}