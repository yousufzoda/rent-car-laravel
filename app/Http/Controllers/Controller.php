<?php

namespace App\Http\Controllers;

use App\Http\Requests\API\RentCarRequest;
use App\Http\Requests\API\TerminateRentCarRequest;
use App\Http\Resources\RentCarResource;
use App\Http\Resources\TerminateRentCarResource;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 *
 * @OA\Info(
 *     title="API документация",
 *     version="1.0.0",
 * )
 *
 * @param RentCarRequest $request
 * @return RentCarResource
 *
 * @OA\Get(
 *     path="/api/rent/car",
 *     summary="Регистрация аренды автомобиля пользователем",
 *     @OA\Parameter(
 *         name="car_id",
 *         in="query",
 *         description="ID автомобиль",
 *         example="5",
 *         required=true,
 *         @OA\Schema(
 *             type="integer",
 *         ),
 *     ),
 *     @OA\Parameter(
 *         name="user_id",
 *         in="query",
 *         description="ID пользователь",
 *         example="10",
 *         required=true,
 *         @OA\Schema(
 *             type="integer",
 *         ),
 *     ),
 *     @OA\Response(
 *          response="200",
 *          description="OK",
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              @OA\Schema(
 *                  @OA\Property(
 *                      property="data",
 *                      @OA\Property(
 *                          property="message",
 *                          type="string",
 *                      )
 *                  )
 *              )
 *          )
 *     )
 * )
 *
 * /**
 * @param TerminateRentCarRequest $request
 * @return TerminateRentCarResource
 *
 * @OA\Get(
 *     path="/api/terminate/rentcar",
 *     summary="Прекращение аренды автомобиля пользователем",
 *     @OA\Parameter(
 *         name="car_id",
 *         in="query",
 *         description="ID автомобиль",
 *         example="5",
 *         required=true,
 *         @OA\Schema(
 *             type="integer",
 *         ),
 *     ),
 *     @OA\Response(
 *          response="200",
 *          description="OK",
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              @OA\Schema(
 *                  @OA\Property(
 *                      property="data",
 *                      @OA\Property(
 *                          property="message",
 *                          type="string",
 *                      )
 *                  )
 *              )
 *          )
 *     )
 * )
 *
 * @date 25.10.2022
 * @author Юсуфзода
 *
 */


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
