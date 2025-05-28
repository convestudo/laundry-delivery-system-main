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
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('voucher_id')->nullable()->after('customer_id');
            $table->foreign('voucher_id')
                ->references('id') // Make sure 'user_id' exists in users table
                ->on('vouchers')
                ->onDelete('set null');
            $table->decimal('voucher_amount', 10, 2)->default(0.00)->nullable()->after('voucher_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['voucher_id']);
            $table->dropColumn('voucher_id');
            $table->dropColumn('voucher_amount');
        });
    }
};
