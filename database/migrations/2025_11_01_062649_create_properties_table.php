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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->decimal('price', 15, 2);
            $table->decimal('area', 10, 2);
            $table->integer('bedrooms')->nullable();
            $table->integer('bathrooms')->nullable();
            $table->integer('floors')->nullable();
            $table->string('floor_number')->nullable();
            $table->foreignId('property_type_id')->constrained()->onDelete('cascade');
            $table->foreignId('service_type_id')->constrained()->onDelete('cascade');
            $table->foreignId('city_id')->constrained()->onDelete('cascade');
            $table->string('district')->nullable();
            $table->string('status')->default('available'); // available, sold, rented
            $table->string('featured_status')->nullable(); // جديد, مميز, استثمار
            $table->integer('likes_count')->default(0);
            $table->string('main_image')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
