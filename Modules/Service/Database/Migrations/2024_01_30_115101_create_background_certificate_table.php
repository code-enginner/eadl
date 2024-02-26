<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('background_certificate', function (Blueprint $table) {
            $table->id();
            $table->string('person_national_id')->comment('کد ملی استعلام شونده');
            $table->string('person_cellphone')->comment('شماره موبایل استعلام شونده');
            $table->string('person_status')->comment('شخص حقیق یا حقوقی');
            $table->string('receiver_national_id')->comment('کد ملی استعلام گیرنده');
            $table->string('organization_id')->comment('شناسه سازمان استعلام گیرنده');
            $table->string('receiver_job_title')->comment('سِمت استعلام گیرنده');
            $table->string('office_code')->nullable()->index();
            $table->string('otp_code');
            $table->string('tracking_id');
            $table->string('final_message')->nullable()->default(NULL);
            $table->string('paid')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('background_certificate');
    }
};
