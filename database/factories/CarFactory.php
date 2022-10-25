<?php

namespace Database\Factories;

use App\Models\Car;
use App\Models\ModelCar;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    protected $model = Car::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'model_id' => ModelCar::inRandomOrder()->first()->id,
            'number' => sprintf('%s%03d%s%02d',
                $this->faker->randomElement(['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H']),
                $this->faker->numberBetween(1, 999),
                implode('', $this->faker->randomElements(['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H'], 2)),
                $this->faker->numberBetween(0, 99),
            )
        ];
    }
}
