<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class RentCarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'user_id' => 'required|exists:App\Models\User,id',
            'car_id' => 'required|exists:App\Models\Car,id',
        ];
    }
}
