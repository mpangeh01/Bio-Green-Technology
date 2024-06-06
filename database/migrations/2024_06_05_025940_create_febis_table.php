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
        Schema::create('febis', function (Blueprint $table) {
            $table->id();
            $table->string('identifier')->unique();
            $table->float('temperature')->nullable();
            $table->float('humidity')->nullable();
            $table->float('turbidity')->nullable();
            $table->float('dissolved_oxygen')->nullable();
            $table->float('ph')->nullable();
            $table->unsignedBigInteger('pond_id');
            $table->timestamps();
            $table->foreign('pond_id')->references('id')->on('ponds')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('febis');
    }
};
