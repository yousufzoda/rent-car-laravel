<?php

namespace Database\Seeders;

use App\Models\BrandCar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandCarTableSeeder extends Seeder
{
    const CARS = [
        'Mercedes',
        'Hyundai',
        'Toyota',
        'Mitsubishi',
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::CARS as $item) {
            $record = new BrandCar();
            $record->brand_name = $item;
            $record->save();
        }
    }
}
