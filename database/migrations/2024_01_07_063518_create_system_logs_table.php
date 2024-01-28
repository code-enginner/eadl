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
        Schema::create('system_logs', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->string('level')->nullable()->default(NULL)->comment('for example: Info, Error, Emergency, ...');
            $table->string('label')->nullable()->comment('a label of action that cause create a log');
            $table->json('message')->nullable()->default(NULL);
            $table->json('context')->nullable()->default(NULL)->comment('additional information such as request data');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('system_logs');
    }
};
