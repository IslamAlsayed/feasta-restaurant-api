<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class StockRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'amount' => 'required|integer|min:1',
            'category' => 'required|string|in:vegetable,non-vegetable',
            'type' => 'required|string|in:food,drink',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'selling_price' => 'required|numeric|min:0.1',
            'buying_price' => 'required|numeric|min:0.1',
            'vat' => 'required|numeric|min:1|max:25',
            'cookTime' => 'nullable|integer|min:1|max:45',
            'difficulty' => 'nullable|string|in:easy,medium,hard',
            'cooking' => 'nullable|string|max:255',
            'calories' => 'nullable|integer|min:1|max:2000',
            'mealType' => 'nullable|string|in:breakfast,lunch,dinner',
            'ingredients' => 'nullable|json',
            'image' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:500',
        ];
    }
}
