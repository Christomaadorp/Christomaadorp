<?php

namespace App\Http\Requests;

use App\Models\TaskResult;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTaskResultRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('task_result_create');
    }

    public function rules()
    {
        return [
            'taskid' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'runat' => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
            'duration' => [
                'string',
                'nullable',
            ],
            'result' => [
                'string',
                'nullable',
            ],
            'timestamp' => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
        ];
    }
}
