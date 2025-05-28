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
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            $table->string('voucher_code')->unique();
            $table->decimal('voucher_amount', 10, 2);
            $table->enum('voucher_status', ['active', 'inactive'])->default('active');
            $table->timestamp('expired_at')->nullable(); // Add this for expiration control
            $table->timestamps();
            $table->softDeletes(); // For soft delete support
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vouchers');
    }
};
