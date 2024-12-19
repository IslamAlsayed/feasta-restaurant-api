<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class SiteRequest extends FormRequest
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
            'logo' => 'nullable|string|min:1',
            'site_name' => 'nullable|string|min:1',
            'email' => 'nullable|email|min:1',
            'phone' => 'nullable|string|min:1',
            'address' => 'nullable|string',
            'work_hours' => 'nullable|string',
            'about-us' => 'nullable|string',
            'developer' => 'nullable|json',
        ];
    }
}
