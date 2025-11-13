<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement('ALTER TABLE properties MODIFY main_image TEXT NULL');
        DB::statement('ALTER TABLE property_images MODIFY image_path TEXT NOT NULL');
        DB::statement('ALTER TABLE sliders MODIFY background_image TEXT NOT NULL');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('ALTER TABLE properties MODIFY main_image VARCHAR(255) NULL');
        DB::statement('ALTER TABLE property_images MODIFY image_path VARCHAR(255) NOT NULL');
        DB::statement('ALTER TABLE sliders MODIFY background_image VARCHAR(255) NOT NULL');
    }
};

