<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * sail art db:seed --class=PlanSeeder
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            PlanSeeder::class
        ]);
    }
}
