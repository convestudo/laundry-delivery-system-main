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
        Schema::table('service_management', function (Blueprint $table) {
            $table->string('service_img')->nullable()->after('service_desc');
        });
    }

    public function down(): void
    {
        Schema::table('service_management', function (Blueprint $table) {
            $table->dropColumn('service_img');
        });
    }
};
