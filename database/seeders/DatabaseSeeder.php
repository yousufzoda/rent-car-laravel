<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Car;
use App\Models\User;
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
        $this->call(BrandCarTableSeeder::class);
        $this->call(ModelCarTableSeeder::class);
        Car::factory()->count(60)->create();
        User::factory()->count(30)->create();
    }
}
