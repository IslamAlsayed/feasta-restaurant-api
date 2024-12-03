<?php

namespace App\Http\Requests\v1\Reservation;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'string',
            'email' => 'required|email',
            'capacity' => 'required|integer|min:1|max:10',
            'date' => 'required|date',
            'time' => 'required|between:1,4',
            'phone' => 'required|regex:/^[0-9]{10,15}$/',
            'client_id' => 'required|exists:clients,id',
        ];
    }
}
