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
        Schema::create('service_bag_details', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('service_management_id');
            $table->foreign('service_management_id')->references('id')->on('service_management')->onDelete('cascade');

            $table->enum('bag_size', ['small', 'medium', 'large']);
            $table->enum('weight_per_kg', ['8kg', '15kg', '30kg']);
            $table->decimal('price', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_bag_details');
    }
};
