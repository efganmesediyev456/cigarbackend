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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('home_story_block_title_az')->nullable();
            $table->string('home_story_block_title_en')->nullable();
            $table->string('home_story_block_title_ru')->nullable();
            $table->string('home_story_block_subtitle_az')->nullable();
            $table->string('home_story_block_subtitle_en')->nullable();
            $table->string('home_story_block_subtitle_ru')->nullable();
            $table->string('site_created_by_az')->nullable();
            $table->string('site_created_by_en')->nullable();
            $table->string('site_created_by_ru')->nullable();
            $table->string('sll_site_reserved_az')->nullable();
            $table->string('sll_site_reserved_en')->nullable();
            $table->string('sll_site_reserved_ru')->nullable();
            $table->string('facebook')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('instagram')->nullable();
            $table->string('site_logo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
