<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('favorites', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('post_id')->constrained()->onDelete('cascade');
            $table->timestamps();

            // Add unique constraint to prevent duplicate favorites
            $table->unique(['user_id', 'post_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('favorites');
    }
};
