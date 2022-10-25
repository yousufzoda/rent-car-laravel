<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\RentCarRequest;
use App\Http\Requests\API\TerminateRentCarRequest;
use App\Http\Resources\RentCarResource;
use App\Http\Resources\TerminateRentCarResource;
use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Client\HttpClientException;

class ApiRentCarController extends Controller
{
    /**
     * Регистрация аренды автомобиля пользователем, если это разрешено правилами
     *
     * @throws HttpClientException
     */
    public function rentCar(RentCarRequest $request)
    {
        $validated = $request->validated();

        /**
         * @var Car $car
         * @var User $user
         */
        $car = Car::find($validated['car_id']);
        $user = User::find($validated['user_id']);


        if ($car->users()->count() && $user->cars()->count()){
            return response()->json(array(
                'data' => ['status' => false , 'message' => 'Невозможно арендовать больше 1-го автомобиля']
            ));
        }elseif ($car->users()->count() ){
            return response()->json(array(
                'data' => ['status' => false ,'message' => (sprintf('Автомобиль %s %s c с номером %s занято!',$car->model->brand->brand_name,$car->model->model_name, $car->number)) ]
            ));
        }elseif ($user->cars()->count()){
            return response()->json(array(
                'data' => ['status' => false ,'message' => (sprintf('Пользователь %s уже арендовал другой автомобиль!',$user->name)) ]
            ));
        }

        $car->users()->attach($user);

        return new RentCarResource($car);
    }


    public function terminateRent(TerminateRentCarRequest $request)
    {
        $validated = $request->validated();

        /**
         * @var Car $car
         */
        $car = Car::find($validated['car_id']);

        if (!$car->users()->count()){
            return response()->json(array(
                'data' => ['status' => false ,'message' => (sprintf('Автомобиль %s %s с номером %s свободно',$car->model->brand->brand_name,$car->model->model_name, $car->number))]
            ));
        }

        $user = $car->users()->first();
        $car->users()->detach($user);

        return new TerminateRentCarResource(['car' => $car, 'user' => $user]);
    }
}
