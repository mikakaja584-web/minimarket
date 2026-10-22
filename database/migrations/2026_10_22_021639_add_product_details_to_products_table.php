<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('name')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('sku', 100)->nullable()->unique();
            $table->decimal('price', 12, 2)->default(0);
            $table->unsignedInteger('stock')->default(0);
            $table->text('description')->nullable();
            $table->string('image')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropUnique(['sku']);

            $table->dropColumn([
                'name',
                'category_id',
                'sku',
                'price',
                'stock',
                'description',
                'image',
            ]);
        });
    }
};