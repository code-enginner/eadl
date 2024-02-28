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
        Schema::create('transaction_credit_inquiries', function (Blueprint $table) {
            $table->id();
            $table->string('no');
            $table->string('issue_date');
            $table->string('caller_national_code');
            $table->string('caller_post_title');
            $table->string('office_code')->nullable()->index();
            $table->string('paid');
            $table->string('final_message')->nullable()->default(NULL);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_credit_inquiries');
    }
};
