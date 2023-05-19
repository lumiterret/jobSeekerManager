<?php

namespace App\Http\Requests\Person;

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
            'f_name' => 'required|min:2',
            'l_name' => 'required',
            'position' => 'nullable|string'
        ];
    }

    public function attributes()
    {
        return [
            'f_name' =>'Имя',
            'l_name' =>'Фамилия',
        ];
    }
}
