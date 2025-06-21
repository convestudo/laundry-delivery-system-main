<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPaymentStatusAndEmailToExtraChargesTable extends Migration
{
    public function up()
    {
        Schema::table('extra_charges', function (Blueprint $table) {
            $table->string('payment_status')->default('unpaid')->after('total_price'); // e.g., unpaid, paid
            $table->string('email')->after('user_id');
        });
    }

    public function down()
    {
        Schema::table('extra_charges', function (Blueprint $table) {
            $table->dropColumn(['payment_status', 'email']);
        });
    }
}
