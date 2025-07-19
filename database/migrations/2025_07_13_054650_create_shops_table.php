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
        Schema::create('shops', function (Blueprint $table) {
            $table->id();

            // Owner
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // shop owner

            // Basic Info
            $table->string('name');
            $table->string('slug')->unique(); // SEO-friendly URL
            $table->string('category')->nullable(); // or use categories table
            $table->text('description')->nullable();

            // Branding
            $table->string('logo')->nullable();
            $table->string('banner')->nullable();

            // Contact & Location
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('website')->nullable();

            // Business Info
            $table->string('business_type')->nullable(); // e.g., sole proprietorship
            $table->string('tax_id')->nullable();
            $table->boolean('is_verified')->default(false);
            $table->string('status')->default('active'); // active, suspended, etc.

            // Ratings / Engagement
            $table->decimal('rating', 3, 2)->default(0.00); // e.g., 4.50
            $table->unsignedInteger('followers_count')->default(0);
            $table->unsignedInteger('products_count')->default(0);

            // SEO
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();

            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shops');
    }
};
