<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RentCarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'message' => sprintf('Пользователь %s арендовал автомобиль %s %s с номером %s',
                $this->users->first()->name,
                $this->model->brand->name,
                $this->model->name,
                $this->number,
            ),
        ];
    }
}
