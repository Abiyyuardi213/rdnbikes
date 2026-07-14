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
            $table->foreignId('category_id')->nullable()->constrained('categories')->nullOnDelete();
            $table->string('subcategory')->nullable(); // e.g. Road Bikes, Gravel Bikes
            $table->string('name');
            $table->string('slug')->unique();
            $table->unsignedBigInteger('price'); // price in Rupiah
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->json('specs')->nullable(); // frame, fork, groupset, weight, etc.
            $table->json('features')->nullable(); // checklist items
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
