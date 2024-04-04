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
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('name_az')->nullable();
            $table->string('name_en')->nullable();
            $table->string('name_ru')->nullable();
            $table->string('button_title_az')->nullable();
            $table->string('button_url_az')->nullable();
            $table->string('button_title_en')->nullable();
            $table->string('button_url_en')->nullable();
            $table->string('button_title_ru')->nullable();
            $table->string('button_url_ru')->nullable();
            $table->boolean('status_az')->default(0);
            $table->boolean('status_en')->default(0);
            $table->boolean('status_ru')->default(0);
            $table->string('banner_image')->nullable();
            $table->string('banner_video')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};
