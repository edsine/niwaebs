<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @OA\Schema(
 *      schema="EquipmentAndFee",
 *      required={"service_id","name","price","metric"},
 *      @OA\Property(
 *          property="service_id",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="integer",
 *          format="int32"
 *      ),
 *      @OA\Property(
 *          property="name",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="price",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="number",
 *          format="number"
 *      ),
 *      @OA\Property(
 *          property="metric",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="integer",
 *          format="int32"
 *      ),
 *      @OA\Property(
 *          property="sub_service_id",
 *          description="",
 *          readOnly=false,
 *          nullable=true,
 *          type="integer",
 *          format="int32"
 *      ),
 *      @OA\Property(
 *          property="created_at",
 *          description="",
 *          readOnly=true,
 *          nullable=true,
 *          type="string",
 *          format="date-time"
 *      ),
 *      @OA\Property(
 *          property="updated_at",
 *          description="",
 *          readOnly=true,
 *          nullable=true,
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */ class EquipmentAndFee extends Model
{
    use HasFactory;
    public $table = 'equipment_and_fees';

    public $fillable = [
        'service_id',
        'name',
        'price',
        'metric',
        'sub_service_id'
    ];

    protected $casts = [
        'service_id' => 'integer',
        'name' => 'string',
        'price' => 'decimal:2',
        'metric' => 'integer',
        'sub_service_id' => 'integer'
    ];

    public static array $rules = [
        'service_id' => 'required',
        'name' => 'required',
        'price' => 'required',
        'metric' => 'required'
    ];

    public function service() : BelongsTo {
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }

    public function subService() : BelongsTo {
        return $this->belongsTo(Service::class, 'sub_service_id', 'id');
    }
}
