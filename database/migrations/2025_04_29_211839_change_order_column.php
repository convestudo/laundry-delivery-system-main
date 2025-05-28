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
            $table->dropColumn('pickup_time');
            $table->time('pickup_time_start')->after('pickup_date')->nullable();
            $table->time('pickup_time_end')->after('pickup_time_start')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->time('pickup_time')->after('pickup_date')->nullable();
            $table->dropColumn('pickup_time_start');
            $table->dropColumn('pickup_time_end');
        });
    }
};
