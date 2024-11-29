<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
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
            'discount' => 'required|numeric|between:1,100',
            'description' => 'nullable|min:1',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'item_id' => 'required|exists:menus,id',
        ];
    }

    public function messages()
    {
        return [
            'end_date.after' => 'The end date must be a date after the start date.',
        ];
    }
}
