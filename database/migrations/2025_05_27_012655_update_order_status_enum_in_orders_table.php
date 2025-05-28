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
        // Add new enum values to order_status
        DB::statement("ALTER TABLE orders MODIFY COLUMN order_status ENUM('pending', 'processing', 'pick up', 'delivery', 'completed', 'cancelled') DEFAULT 'pending'");
    }

    public function down(): void
    {
        // Rollback to original enum values
        DB::statement("ALTER TABLE orders MODIFY COLUMN order_status ENUM('pending', 'processing', 'completed', 'cancelled') DEFAULT 'pending'");
    }
};
