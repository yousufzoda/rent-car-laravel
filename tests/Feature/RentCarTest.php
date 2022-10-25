<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RentCarTest extends TestCase
{
    const PAGINATE_JSON_STRUCTURE = [
        'links' => [
            'first',
            'last',
            'prev',
            'next',
        ],
        'meta' => [
            'current_page',
            'from',
            'last_page',
            'links' => [
                '*' => [
                    'url',
                    'label',
                    'active',
                ]
            ]
        ]
    ];

    const ERROR_FIELDS_JSON_STRUCTURE = [
        'errors' => [
            'fields' => [
                '*' => []
            ],
        ]
    ];
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_rent_car()
    {
        $response = $this->withHeaders([
            'Accept' => 'application/json'
        ])->json('GET','api/rent/car',[
            'car_id' => 4,
            'user_id' => 6,
        ]);

        \Log::info(1, [$response->getContent()]);

        $response->assertStatus(200);
    }

    public function terminate_rent_car()
    {
        $response = $this->withHeaders([
            'Accept' => 'application/json'
        ])->json('GET','terminate/rentcar',[
            'car_id' => 4,
        ]);

        \Log::info(1, [$response->getContent()]);

        $response->assertStatus(200);
    }

    public function test_release_non_exiting_car()
    {
        $method = 'get';
        $uri = route('terminate.rent.api', [], false);

        $response = $this->json($method, $uri, ['car_id' => 5000000]);
        $response
            ->assertStatus(422);
          //  ->assertJsonStructure(self::ERROR_FIELDS_JSON_STRUCTURE);
    }

}
