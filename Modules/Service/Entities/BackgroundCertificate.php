<?php

namespace Modules\Service\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Service\Database\factories\BackgroundCertificateFactory;

class BackgroundCertificate extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['person_national_id', 'person_cellphone', 'person_status', 'receiver_national_id', 'organization_id', 'receiver_job_title', 'office_code', 'otp_code'];

    protected static function newFactory(): BackgroundCertificateFactory
    {
        //return BackgroundCertificateFactory::new();
    }
}
