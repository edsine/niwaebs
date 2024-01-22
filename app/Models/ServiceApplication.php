<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\EmployerManager\Models\Employer;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @OA\Schema(
 *      schema="ServiceApplication",
 *      required={"service_id","application_form_payment_status","service_type_id","current_step","user_id","mse_are_documents_verified","finance_is_application_fee_verified","finance_is_processing_fee_verified","finance_is_inspection_fee_verified","inspection_status","are_equipment_and_monitoring_fees_verified","area_officer_approval","hod_marine_approval"},
 *      @OA\Property(
 *          property="application_form_payment_status",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="boolean",
 *      ),
 *      @OA\Property(
 *          property="date_of_inspection",
 *          description="",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *          format="date-time"
 *      ),
 *      @OA\Property(
 *          property="service_type_id",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="string",
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
 *      ),
 *      @OA\Property(
 *          property="status_summary",
 *          description="",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="mse_document_verification_comment",
 *          description="",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="comments_on_inspection",
 *          description="",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="inspection_report_document_path",
 *          description="",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="area_officer_signature_path",
 *          description="",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="hod_marine_signature_path",
 *          description="",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="permit_document_path",
 *          description="",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *      )
 * )
 */ class ServiceApplication extends Model
{
    use HasFactory;
    public $table = 'service_applications';

    public $fillable = [
        'service_id',
        'application_form_payment_status',
        'date_of_inspection',
        'service_type_id',
        'current_step',
        'status_summary',
        'user_id',
        'mse_are_documents_verified',
        'mse_document_verification_comment',
        'finance_is_application_fee_verified',
        'finance_is_processing_fee_verified',
        'finance_is_inspection_fee_verified',
        'inspection_status',
        'comments_on_inspection',
        'inspection_report_document_path',
        'are_equipment_and_monitoring_fees_verified',
        'area_officer_approval',
        'area_officer_signature_path',
        'hod_marine_approval',
        'hod_marine_signature_path',
        'permit_document_path'
    ];

    protected $casts = [
        'application_form_payment_status' => 'boolean',
        'date_of_inspection' => 'datetime',
        'service_type_id' => 'string',
        'status_summary' => 'string',
        'mse_document_verification_comment' => 'string',
        'comments_on_inspection' => 'string',
        'inspection_report_document_path' => 'string',
        'area_officer_signature_path' => 'string',
        'hod_marine_signature_path' => 'string',
        'permit_document_path' => 'string'
    ];

    public static array $rules = [
        'service_id' => 'required',
        'application_form_payment_status' => 'required|boolean',
        'date_of_inspection' => 'nullable',
        'service_type_id' => 'required|string|max:100',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'current_step' => 'required',
        'status_summary' => 'nullable|string|max:65535',
        'user_id' => 'required',
        'mse_are_documents_verified' => 'required',
        'mse_document_verification_comment' => 'nullable|string|max:65535',
        'finance_is_application_fee_verified' => 'required',
        'finance_is_processing_fee_verified' => 'required',
        'finance_is_inspection_fee_verified' => 'required',
        'inspection_status' => 'required',
        'comments_on_inspection' => 'nullable|string|max:65535',
        'inspection_report_document_path' => 'nullable|string|max:191',
        'are_equipment_and_monitoring_fees_verified' => 'required',
        'area_officer_approval' => 'required',
        'area_officer_signature_path' => 'nullable|string|max:191',
        'hod_marine_approval' => 'required',
        'hod_marine_signature_path' => 'nullable|string|max:191',
        'permit_document_path' => 'nullable|string|max:191'
    ];

    public function employer()
    {
        $employer = Employer::where('id', $this->user_id)->first();
        return $employer;
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function documents()
    {
        return $this->hasMany(ServiceApplicationDocument::class);
    }
}
