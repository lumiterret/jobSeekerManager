<?php

namespace App\Http\Requests\User;

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
            // создание пользователя
            $create = true;
            $id = null;
        } else {
            // редактирование пользователя
            $create = false;
            $id = $this->get('id');
        }

        $username = [
            'required',
            'min:2',
            Rule::unique('users')->ignore($id),
        ];

        $email = [
            'required',
            'email',
            Rule::unique('users')->ignore($id),
        ];

        $password = $create ? '|min:8' : '';
        return [
            'username' => $username,
            'email' => $email,
            'password' => 'required_if:create,true' . $password,
            'is_admin' => 'boolean',
        ];
    }

    public function attributes()
    {
        return [
            'username' =>'Логин',
            'password' =>'Пароль',
        ];
    }
}
