<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
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
            'payment.used_at' => 'required',
            'payment.expenditure' => 'required|integer|min:1',
            'payment.usage_id' => 'required',
            'payment.memo' => 'nullable|string|max:500'
        ];
    }
}
