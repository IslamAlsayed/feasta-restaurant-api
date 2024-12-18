<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'items' => 'required|json',
            'total' => 'required|numeric',
            'discount' => 'numeric',
            'client' => 'json',
            'address' => 'json',
            'wayEat' => 'required|string',
            'wayPay' => 'required|string',
            'status' => 'nullable|in:pending,completed,cancelled',
            'client_id' => 'required|exists:clients,id',
        ];
    }
}
