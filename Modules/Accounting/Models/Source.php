<?php

namespace Modules\Accounting\Models;

use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    protected $fillable = [
        'name',
        'created_by',
    ];
}
