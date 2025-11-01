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
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('background_image');
            $table->decimal('price', 15, 2)->nullable();
            $table->string('price_label')->nullable(); // مثل "شهرياً" أو null للبيع
            $table->string('property_type')->nullable(); // فيلا - دورين
            $table->string('service_type')->nullable(); // للبيع، للإيجار
            $table->string('location')->nullable(); // الرياض - حي النرجس
            $table->string('area')->nullable(); // 450 متر مربع
            $table->string('badge')->nullable(); // جديد، مميز، استثمار
            $table->string('badge_color')->default('red'); // red, green, blue
            $table->integer('likes_count')->default(0);
            $table->foreignId('property_id')->nullable()->constrained()->onDelete('set null');
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sliders');
    }
};
