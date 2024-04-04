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
        Schema::create('years_olds', function (Blueprint $table) {
            $table->id();
            $table->string('page_title_az')->nullable();
            $table->string('page_title_en')->nullable();
            $table->string('page_title_ru')->nullable();
            $table->string('content1_az')->nullable();
            $table->string('content1_en')->nullable();
            $table->string('content1_ru')->nullable();
            $table->string('content2_az')->nullable();
            $table->string('content2_en')->nullable();
            $table->string('content2_ru')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('years_olds');
    }
};
