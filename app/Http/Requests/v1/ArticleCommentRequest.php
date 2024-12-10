<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class ArticleCommentRequest extends FormRequest
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
            'like' => 'null|in:true,false',
            'comment' => 'required|string|min:1',
            'feeling' => 'required|string',
            'client_id' => 'required|exists:clients,id',
            'article_id' => 'required|exists:articles,id',
        ];
    }
}
