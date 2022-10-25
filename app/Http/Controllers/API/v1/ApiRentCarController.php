<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\RentCarRequest;
use App\Http\Resources\RentCarResource;
use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Client\HttpClientException;

class ApiRentCarController extends Controller
{
    public function rentCar(RentCarRequest $request): RentCarResource
    {
        $validated = $request->validated();

        /**
         * @var Car $car
         * @var User $user
         */
        $car = Car::find($validated['car_id']);
        $user = User::find($validated['user_id']);

        if ($car->users()->count() || $user->cars()->count())
            throw new HttpClientException('Невозможно арендовать автомобиль');

        $car->users()->attach($user);

        return new RentCarResource($car);
    }

    public function terminateRent()
    {

    }
}
