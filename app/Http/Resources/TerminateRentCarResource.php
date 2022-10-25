<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TerminateRentCarResource extends JsonResource
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
            'message' => sprintf('Пользователь %s перестал арендовать автомобиль %s %s с номером %s',
                $this['user']->name,
                $this['car']->model->brand->brand_name,
                $this['car']->model->model_name,
                $this['car']->number,
            ),
        ];
    }
}
