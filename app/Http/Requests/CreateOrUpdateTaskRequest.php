<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrUpdateTaskRequest extends FormRequest
{

    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:254',
            'description' => 'required|string|max:254',
            'done' => 'sometimes|boolean',
            'due_at' => 'sometimes|datetime|after:today'
            ];
    }
}

