<?php

namespace App\Http\Requests;

use App\Models\Task;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTaskRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('task_edit');
    }

    public function rules()
    {
        return [
            'description' => [
                'string',
                'required',
            ],
            'command' => [
                'string',
                'required',
            ],
            'expression' => [
                'string',
                'nullable',
            ],
            'notifications_email' => [
                'string',
                'nullable',
            ],
            'timestamps' => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
        ];
    }
}
