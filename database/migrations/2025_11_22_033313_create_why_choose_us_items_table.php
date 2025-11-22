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
        Schema::create('why_choose_us_items', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // العنوان
            $table->text('description'); // الوصف
            $table->string('icon'); // أيقونة Remix Icon
            $table->string('icon_color')->default('primary'); // لون الأيقونة
            $table->integer('order')->default(0); // ترتيب العرض
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('why_choose_us_items');
    }
};
