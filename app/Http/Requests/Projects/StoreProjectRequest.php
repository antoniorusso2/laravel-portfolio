<?php

namespace App\Http\Requests\Projects;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if (Auth::guest()) {
            return false;
        }

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
            'technologies' => 'nullable|array',
            'type_id' => 'nullable|exists:types,id',
            'media' => 'nullable|array',
            'media.*' => 'file|mimes:jpg,jpeg,png,webp,mp4,webm|max:5120',
        ];
    }
}
