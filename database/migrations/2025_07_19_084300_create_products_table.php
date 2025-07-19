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

            // Relationships
            $table->foreignId('shop_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('brand_id')->nullable()->constrained()->nullOnDelete();

            // Basic Info
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();

            // Pricing
            $table->decimal('price', 10, 2);
            $table->decimal('sale_price', 10, 2)->nullable();
            $table->boolean('on_sale')->default(false);

            // Inventory
            $table->integer('stock')->default(0);
            $table->boolean('in_stock')->default(true);
            $table->string('sku')->nullable()->unique();

            // Media
            $table->string('thumbnail')->nullable();
            $table->json('images')->nullable();

            // Categorization
            $table->string('category')->nullable(); // In case category name is directly stored
            $table->string('tags')->nullable(); // comma-separated tags

            // Attributes
            $table->string('color')->nullable();
            $table->string('size')->nullable();
            $table->json('specifications')->nullable(); // JSON for specs like weight, material, etc.

            // Ratings & Engagement
            $table->double('average_rating')->default(0);
            $table->unsignedInteger('reviews_count')->default(0);
            $table->unsignedInteger('views')->default(0);

            // Visibility & Status
            $table->boolean('is_active')->default(true);
            $table->boolean('is_featured')->default(false);

            // SEO
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();

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
