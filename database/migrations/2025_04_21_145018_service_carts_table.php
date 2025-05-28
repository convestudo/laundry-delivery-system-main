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
        Schema::create('service_carts', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('service_management_id');
            $table->foreign('service_management_id')->references('id')->on('service_management')->onDelete('cascade');

            // For piece-based services
            $table->integer('quantity')->nullable(); // how many pieces

            // For weight-based services
            $table->unsignedBigInteger('service_bag_details_id')->nullable(); // FK to bag details
            $table->foreign('service_bag_details_id')->references('id')->on('service_bag_details')->onDelete('set null');

            $table->decimal('price', 8, 2); // actual price (useful if price may change later)

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_carts');
    }
};
