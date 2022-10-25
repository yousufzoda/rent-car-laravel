<?php

namespace Tests\Feature;

use App\Models\Car;
use App\Models\User;
use Tests\TestCase;

class RentCarTest extends TestCase
{

    //попытка получить аренду автомобилья

    public function test_rent_car()
    {
        $car = Car::inRandomOrder()->first();
        $user = User::inRandomOrder()->first();
        $response = $this->withHeaders([
            'Accept' => 'application/json'
        ])->json('GET','api/rent/car',[
            'car_id' => $car->id,
            'user_id' => $user->id,
        ]);
        $response
            ->assertOk()
            ->assertJsonStructure(['data']);
        $response->assertStatus(200);

    }

    // прекращение аренды автомобиля

    public function test_terminate_rent_car()
    {
        $car = Car::inRandomOrder()->first();
        $response = $this
            ->withHeaders([
            'Accept' => 'application/json'
        ])->json('GET','api/terminate/rentcar',[
            'car_id' => $car->id,
        ]);

        $response
            ->assertOk()
            ->assertJsonStructure(['data']);
        $response->assertStatus(200);
    }

    //аренда несуществующего автомобиля

    public function test_terminate_non_exiting_car()
    {
        $response = $this
            ->withHeaders([
                'Accept' => 'application/json'
            ])->json('GET','api/terminate/rentcar',[
                'car_id' => 100000000,
            ]);

        $response->assertStatus(422);

    }

}
