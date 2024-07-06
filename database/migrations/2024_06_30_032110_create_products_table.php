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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->timestamps();
        }); 
        
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('image_url');
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->unsignedBigInteger('id_category'); // Mantén esto como está
            $table->integer('stock');
            $table->integer('min_stock');
            $table->timestamps();
        
            // Add foreign key constraint
            $table->foreign('id_category')->references('id')->on('categories')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
        Schema::dropIfExists('products');
        
    }
};
