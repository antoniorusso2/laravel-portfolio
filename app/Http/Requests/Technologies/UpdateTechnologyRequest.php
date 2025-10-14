<?php

namespace App\Http\Requests\Technologies;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateTechnologyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return !Auth::guest();
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'color' => ['required', 'string', 'max:255'],
            'icon_external_url' => ['nullable', 'string', 'max:255'],
            'icon' => ['nullable', 'string', 'max:255'],
            'level' => ['required', 'numeric', 'min:1', 'max:5'],
        ];
    }
}
