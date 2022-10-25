<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\User;

class RentCarController extends Controller
{
    public function rentCar(){
        $users = User::all();
        $cars = Car::all();

        return view('rent_car', compact('users', 'cars'));
    }
}
