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
        Schema::create('laptops', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->string('os');
            $table->string('cpu');
            $table->string('gpu');
            $table->string('ram_type');
            $table->integer('ram_size');
            $table->string('disk1_type');
            $table->integer('disk1_size');
            $table->string('disk2_type')->nullable();
            $table->integer('disk2_size')->nullable();
            $table->float('display_size');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laptops');
    }
};
