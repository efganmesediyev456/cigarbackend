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
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->longText('content_az')->nullable();
            $table->longText('content_en')->nullable();
            $table->longText('content_ru')->nullable();
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('vision_az')->nullable();
            $table->string('vision_en')->nullable();
            $table->string('vision_ru')->nullable();
            $table->string('mission_az')->nullable();
            $table->string('mission_en')->nullable();
            $table->string('mission_ru')->nullable();
            $table->string('video')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
