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
        Schema::create('fish_reductions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pond_id');
            $table->unsignedBigInteger('fish_type_id');
            $table->date('date_reduced');
            $table->integer('quantity');
            $table->decimal('cost_per_fish', 8, 2)->nullable();
            $table->decimal('total', 8, 2)->nullable();
            $table->decimal('weight', 8, 2)->nullable();
            $table->unsignedBigInteger('farm_id');
            $table->timestamps();

            $table->foreign('pond_id')->references('id')->on('ponds')->onDelete('cascade');
            $table->foreign('fish_type_id')->references('id')->on('fish_types')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fish_reductions');
    }
};
