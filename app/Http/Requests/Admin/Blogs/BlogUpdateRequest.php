<?php

namespace App\Http\Requests\Admin\Blogs;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BlogUpdateRequest extends FormRequest
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
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => [
                'required', 'string', 'max:255',
                Rule::unique('blogs')->ignore(request()->route()->parameter('blog')),
            ],
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
        ];
    }
}
