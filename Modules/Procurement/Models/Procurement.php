<?php

namespace Modules\Procurement\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Modules\Procurement\Models\Requisition;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Procurement extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'user_id',
        'issue_date',
        'reference_number',
        'title',
        'status',
        'document',

    ];
    public static array $rules=[

        'type'=>'required',
        'user_id'=>'required',
        'issue_date'=>'required',
        'reference_number'=>'required',
        'title'=>'required',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function requisition(){
        return $this->hasMany(Requisition::class);
    }

    // protected static function newFactory()
    // {
    //     return \Modules\Procurement\Database\factories\ProcurementFactory::new();
    // }
}
