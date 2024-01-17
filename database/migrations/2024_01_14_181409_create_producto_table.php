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
        Schema::dropIfExists('productos');
        
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);

            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('type_id');
            
            $table->decimal('price', $precision=8, $escala=2);
            $table->integer('stock')->default(0);
            $table->boolean('relevant')->default(false);
            $table->boolean('visible')->default(true);
            $table->boolean('state')->default(true);
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('type_id')->references('id')->on('types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
