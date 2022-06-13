<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateOrUpdateProjectRequest extends FormRequest
{

    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules()
    {
        return [
            'id' => ['nullable', 'integer', 'min:1', Rule::unique('projects')->ignore($this->id)],
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'started_at' => 'sometimes|date',
            'ended_at' => 'sometimes|nullable|date|after:started_at'
        ];
    }
}
