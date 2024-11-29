<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'price' => 'required|numeric|min:0.1',
            'rating' => 'nullable|integer|min:1|max:5',
            'cookingTime' => 'nullable|integer|min:1',
            'quantity' => 'required|numeric|min:0.1',
            'cooking' => 'nullable|string|max:255',
            'mealType' => 'nullable|string|in:breakfast,lunch,dinner,dessert',
            'vat' => 'required|numeric|min:1|max:25',
            'item_code' => 'nullable|string',
            'offer_price' => 'required|date',
            'offer_end_at' => 'required|date|after:start_date',
            'discount' => 'nullable|integer|min:1',
            'description' => 'nullable|string|max:500',
            'image' => 'nullable|string|max:255',
            'chef_id' => 'required|exists:chefs,id',
        ];
    }
}
