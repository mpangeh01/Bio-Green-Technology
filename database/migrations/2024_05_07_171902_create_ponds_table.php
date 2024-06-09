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
        Schema::create('ponds', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('location');
            $table->string('pondType')->nullable();
            $table->float('length')->nullable();
            $table->float('width')->nullable();
            $table->float('depth')->nullable();
            $table->date('date_constructed')->nullable();
            $table->unsignedBigInteger('farm_id');
            $table->timestamps();

            // Define foreign key constraint
            $table->foreign('farm_id')->references('id')->on('farms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ponds');
    }
};
