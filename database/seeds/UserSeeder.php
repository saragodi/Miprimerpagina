<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        $user = User::create([
            'name' => "Webmaster",
            'email' => "webmaster@derch.mx",
            'password' => bcrypt('derch12345'),
        ]);
        $user->assignRole('webmaster');

        $user = User::create([
            'name' => "Administrador",
            'email' => "admin@derch.mx",
            'password' => bcrypt('derch12345'),
        ]);
        $user->assignRole('admin');

        $user = User::create([
            'name' => "Analista",
            'email' => "analista@derch.mx",
            'password' => bcrypt('derch12345'),
        ]);
        $user->assignRole('analyst');

        $user = User::create([
            'name' => "Cliente",
            'email' => "cliente@derch.mx",
            'password' => bcrypt('derch12345'),
        ]);
        $user->assignRole('customer');
    }
}
