<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            AdminSeeder::class,
            BookSeeder::class,
            // OrderSeeder::class, // Descomente se quiser criar pedidos de exemplo
        ]);
    }
}