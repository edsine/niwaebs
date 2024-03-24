<?php

namespace App\Models;

use App\Models\Reminderuser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reminder extends Model
{
    use HasFactory;

    public $fillable=[
        'subject',
        'message',
        'reminderstart_date',
        'reminderend_date',
        'frequency',
    ];

    public function reminderuser(){
        return $this->hasMany(Reminderuser::class);
    }
}
