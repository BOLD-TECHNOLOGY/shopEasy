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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // author

            $table->string('title');
            $table->string('slug')->unique(); // URL-friendly title
            $table->string('image')->nullable(); // featured image
            $table->text('content'); // this can act as a description or full post

            $table->boolean('is_published')->default(false); // control visibility
            $table->timestamp('published_at')->nullable(); // for future scheduling

            $table->timestamps();
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
