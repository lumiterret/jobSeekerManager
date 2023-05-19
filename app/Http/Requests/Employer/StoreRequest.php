<?php

namespace App\Http\Requests\Employer;

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
        if($this->getMethod() === 'POST') {
            // создание
            $id = null;
        } else {
            // редактирование
            $id = $this->get('id');
        }
        $title = [
            'required',
            'min:2',
            Rule::unique('employers')->ignore($id),
        ];
        return [
            'title' => $title,
            'description' => 'required|min:10|max:65535'
        ];
    }

    public function attributes()
    {
        return [
            'title' =>'Название',
            'description' =>'Описание',
        ];
    }
}
