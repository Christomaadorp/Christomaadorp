<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TaskResult extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'task_results';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'run_at',
    ];

    protected $fillable = [
        'task_id',
        'result',
        'timestamp',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getAverageRuntimeAttribute()
    {
        return number_format($this->results()->avg('duration') /1000, 2);
    }
}
