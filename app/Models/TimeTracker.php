<?php

namespace App\Models;

use App\Models\Project;
use App\Models\ProjectTask;
use Modules\Accounting\Models\Utility;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TimeTracker extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'task_id',
        'is_active',
        'tag_id',
        'name',
        'is_billable',
        'start_time',
        'end_time',
        'total_time',
        'created_by',

    ];

    protected $appends  = array(
        'project_name',
        'project_task',
        'total',
    );

    public function getProjectNameAttribute($value)
    {
        $project = Project::select('id', 'project_name')->where('id', $this->project_id)->first();


        return $project ? $project->project_name : '';
    }


    public function getProjectTaskAttribute($value)
    {
        $task = ProjectTask::select('id', 'name')->where('id', $this->task_id)->first();

        return $task ? $task->name : '';
    }

public function getTotalAttribute($value)
    {
        $total = Utility::second_to_time($this->total_time);

        return $total ? $total : '00:00:00';
    }
}
