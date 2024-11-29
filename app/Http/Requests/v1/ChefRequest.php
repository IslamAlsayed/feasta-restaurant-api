<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class ChefRequest extends FormRequest
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
            'email' => 'required|email|exist:chefs',
            'phone' => 'required|regex:/^[0-9]{10,15}$/',
            'address' => 'required|string',
            'age' => 'required|min:17',
            'titleJob' => 'required|string',
            'specialty' => 'required|string',
            'description' => 'required|string',
            'information' => 'required|string',
            'about' => 'required|string',
            'experience' => '',
            'skills' => '',
            'favorite_dish' => '',
            'favorite_dish_image' => '',
            'years_experience' => '',
            'media' => '',
            'image' => 'required|image'
        ];
    }
}
