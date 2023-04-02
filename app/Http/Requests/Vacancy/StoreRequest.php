<?php

namespace App\Http\Requests\Vacancy;

use App\Models\Employer;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'title' => 'required|min:6',
            'description' => 'required|min:20|max:65535',
            'employer_id' => ['nullable', Rule::exists(Employer::class, 'id')]
        ];
    }

    public function attributes()
    {
        return [
            'title' =>'Название вакансии',
            'description' =>'Описание вакансии',
            'employer_id' =>'Компания',
        ];
    }
}
