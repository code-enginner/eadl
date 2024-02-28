<?php

namespace Modules\Service\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Service\Database\factories\CertificateOriginalityFactory;

class CertificateOriginality extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['no', 'issue_date', 'caller_national_code', 'caller_post_title', 'office_code', 'paid', 'final_message'];
    protected $table = 'transaction_credit_inquiries';

    protected static function newFactory(): CertificateOriginalityFactory
    {
        //return CertificateOriginalityFactory::new();
    }
}
