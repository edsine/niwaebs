<?php

namespace Modules\EmployerManager\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\EmployerManager\Models\Certificate;
use Modules\EmployerManager\Models\Employer;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'employer_id', 'payment_type', 'rrr', 'invoice_number', 'invoice_generated_at','service_id','service_type_id','document_uploads',
        'invoice_duration', 'payment_status', 'amount', 'approval_status', 'paid_at', 'transaction_id', 'sub_service_id',
        'contribution_year', 'contribution_period', 'contribution_months', 'employees', 'certificate_status', 'letter_of_intent',
    ];

    public function employer(){
        return $this->belongsTo(Employer::class);
    }

    public function certificate()
{
    return $this->belongsTo(Certificate::class);
}

}
