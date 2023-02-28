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
        Schema::create('smartwatches', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->float('display_size');
            $table->string('os');
            $table->tinyInteger('has_gps')->comment('0=no 1=yes');
            $table->string('connection_type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('smartwatches');
    }
};
