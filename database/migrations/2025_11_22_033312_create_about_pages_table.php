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
        Schema::create('about_pages', function (Blueprint $table) {
            $table->id();
            $table->text('introduction')->nullable(); // النص التعريفي
            $table->string('vision_title')->nullable(); // عنوان الرؤية
            $table->text('vision_content')->nullable(); // محتوى الرؤية
            $table->string('mission_title')->nullable(); // عنوان الرسالة
            $table->text('mission_content')->nullable(); // محتوى الرسالة
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_pages');
    }
};
