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
        Schema::create('service_management', function (Blueprint $table) {
            $table->id();
            $table->string('service_name');
            $table->string('service_desc');
            $table->enum('calculate_by', ['piece', 'weight'])->default('piece');
            $table->decimal('pieces_price', 8, 2);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_management');
    }
};
