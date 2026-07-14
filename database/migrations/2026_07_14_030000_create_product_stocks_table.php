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
        // 1. Remove stock column from products table
        if (Schema::hasColumn('products', 'stock')) {
            Schema::table('products', function (Blueprint $table) {
                $table->dropColumn('stock');
            });
        }

        // 2. Create product_stocks table
        Schema::create('product_stocks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->string('size')->nullable();  // e.g. S, M, L or Apparel Size
            $table->string('color')->nullable(); // e.g. Hitam, Merah, Turquoise
            $table->unsignedInteger('qty')->default(0); // quantity of stock
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_stocks');

        Schema::table('products', function (Blueprint $table) {
            $table->unsignedInteger('stock')->default(10)->after('price');
        });
    }
};
