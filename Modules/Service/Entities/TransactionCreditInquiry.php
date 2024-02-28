<?php

namespace Modules\Service\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Service\Database\factories\TransactionCreditInquiryFactory;

class TransactionCreditInquiry extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    protected $table = '';

    protected static function newFactory(): TransactionCreditInquiryFactory
    {
        //return TransactionCreditInquiryFactory::new();
    }
}
