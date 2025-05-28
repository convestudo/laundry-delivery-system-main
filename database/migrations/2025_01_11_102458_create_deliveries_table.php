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
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();
            $table->enum('gender', ['male', 'female']);
            $table->string('old');
            $table->enum('vehicle_type', ['car', 'motorcycle']);
            $table->string('plate_number');
            $table->string('insurance_document');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->enum('driver_status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deliveries');
    }
};
