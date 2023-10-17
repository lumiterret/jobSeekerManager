<?php

namespace App\Http\Requests\Appointment;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'vacancy_id' => 'required',
            'date' => 'required|date',
            'start_time' => 'nullable|date_format:H:i',
            'all-day' => 'boolean',
            'description' => 'nullable|string',
            'meeting' => 'nullable|url',
        ];
    }
}
