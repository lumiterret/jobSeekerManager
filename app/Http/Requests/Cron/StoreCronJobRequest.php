<?php

namespace App\Http\Requests\Cron;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCronJobRequest extends FormRequest
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
        if ($this->getMethod() === 'POST'){
            $create = true;
            $id = null;
        } else {
            $create = false;
            $id = $this->get('id');
        }

        $command = [
            'required_if:create,true',
            'min:3',
            Rule::unique('cron_jobs')->ignore($id),
        ];
        return [
            'command' => $command,
            'schedule_time' => 'cron',
            'description' => 'required',
            'is_active' => 'boolean',
        ];
    }

    public function attributes()
    {
        return [
            'command' => 'Команда',
            'schedule_time' => 'Расписание',
            'description' => 'Описание',
        ];
    }
}
