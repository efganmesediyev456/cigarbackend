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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name_az')->nullable();
            $table->string('name_en')->nullable();
            $table->string('name_ru')->nullable();
            $table->string('subtitle_az')->nullable();
            $table->string('subtitle_en')->nullable();
            $table->string('subtitle_ru')->nullable();
            $table->string('made_in_az')->nullable();
            $table->string('made_in_en')->nullable();
            $table->string('made_in_ru')->nullable();
            $table->string('size_az')->nullable();
            $table->string('size_en')->nullable();
            $table->string('size_ru')->nullable();
            $table->string('inbox_az')->nullable();
            $table->string('inbox_en')->nullable();
            $table->string('inbox_ru')->nullable();
            $table->string('smoking_time_az')->nullable();
            $table->string('smoking_time_en')->nullable();
            $table->string('smoking_time_ru')->nullable();
            $table->string('consist_az')->nullable();
            $table->string('consist_en')->nullable();
            $table->string('consist_ru')->nullable();
            $table->longText('description_az')->nullable();
            $table->longText('description_en')->nullable();
            $table->longText('description_ru')->nullable();
            $table->integer('strength')->nullable();
            $table->decimal('price')->nullable();
            $table->string('product_image')->nullable();
            $table->boolean('status_az')->default(0);
            $table->boolean('status_en')->default(0);
            $table->boolean('status_ru')->default(0);
            $table->bigInteger('category_id')->unsigned();
            $table->foreign('category_id')->on('categories')->references('id')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
