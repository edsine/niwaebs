<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use OwenIt\Auditing\Auditable as AuditingAuditable;
use OwenIt\Auditing\Contracts\Auditable;
use Modules\Shared\Models\Department;

class DocumentsCategory extends Model implements Auditable
{
    use SoftDeletes;
    use AuditingAuditable;
    use HasFactory;
    public $table = 'documents_categories';

    public $fillable = [
        'name',
        'description',
        'department_id',
    ];

     /**
     * Get the departments associated with the category.
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * Get the documents associated with the category.
     */
    public function documents()
    {
        return $this->hasMany(Documents::class, 'category_id', 'id');
    }

    public function documentsManager()
{
    return $this->hasMany(Documents::class, 'category_id', 'id');
}
    
}
