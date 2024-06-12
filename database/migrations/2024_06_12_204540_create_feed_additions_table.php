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
        Schema::create('feed_additions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('feed_type_id');
            $table->unsignedBigInteger('pond_id');
            $table->integer('quantity');
            $table->decimal('cost', 8, 2);
            $table->date('date_purchased')->nullable();
            $table->timestamps();

            $table->foreign('feed_type_id')->references('id')->on('feed_types')->onDelete('cascade');
            $table->foreign('pond_id')->references('id')->on('ponds')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feed_additions');
    }
};
