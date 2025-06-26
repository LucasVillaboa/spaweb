<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuariosSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::firstOrCreate([
            'email' => 'lucas.villaboa@gmail.com'
        ], [
            'name' => 'Lucas',
            'password' => Hash::make('Lucas32#'),
        ]);
        $admin->assignRole('admin');

        $profesional = User::firstOrCreate([
            'email' => 'ana@spa.com'
        ], [
            'name' => 'Ana',
            'password' => Hash::make('12345678'),
        ]);
        $profesional->assignRole('profesional');
    }
}
