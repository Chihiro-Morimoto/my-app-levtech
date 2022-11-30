<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'task.title' => 'required|string|max:100',
            'task.deadline' => 'nullable|after_or_equal:now',
            'task.place' => 'required|string|max:100',
            'task.body' => 'required|string|max:400',
        ];
    }
}
