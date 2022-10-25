<?php

namespace Database\Seeders;

use App\Models\ModelCar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModelCarTableSeeder extends Seeder
{
    const MODELS = [
        [
            'brand_id' => 1,
            'name' => 'AMG GT',
        ],
        [
            'brand_id' => 1,
            'name' => 'S-class',
        ],
        [
            'brand_id' => 1,
            'name' => 'Maybach',
        ],
        [
            'brand_id' => 1,
            'name' => 'GLC AMG',
        ],
        [
            'brand_id' => 1,
            'name' => 'GLA',
        ],
        [
            'brand_id' => 2,
            'name' => 'CRETA',
        ],
        [
            'brand_id' => 2,
            'name' => 'TUCSON',
        ],
        [
            'brand_id' => 2,
            'name' => 'SOLARIS',
        ],
        [
            'brand_id' => 2,
            'name' => 'SONATA',
        ],
        [
            'brand_id' => 3,
            'name' => 'COROLLA',
        ],
        [
            'brand_id' => 3,
            'name' => 'CAMRY',
        ],
        [
            'brand_id' => 3,
            'name' => 'C-HR',
        ],
        [
            'brand_id' => 3,
            'name' => 'RAV4',
        ],
        [
            'brand_id' => 4,
            'name' => 'ASX',
        ],
        [
            'brand_id' => 4,
            'name' => 'ECLIPSE',
        ],
        [
            'brand_id' => 4,
            'name' => 'COLT',
        ],
        [
            'brand_id' => 4,
            'name' => 'LANCER',
        ],
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::MODELS as $item) {
            $record = new ModelCar();
            $record->brand_id = $item['brand_id'];
            $record->model_name = $item['name'];
            $record->save();
        }
    }
}
