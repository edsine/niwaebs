<?php

namespace Modules\HRMSystem\Models;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    protected $fillable = [
        'department_id','name','created_by'
    ];
}
