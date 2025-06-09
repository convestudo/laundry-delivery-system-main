<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->string('stripe_email')->nullable()->after('order_id');
            $table->string('stripe_payment_intent_id')->nullable()->after('stripe_email');
            $table->string('stripe_charge_id')->nullable()->after('stripe_payment_intent_id');
            $table->string('currency', 10)->default('MYR')->after('stripe_charge_id');
            $table->string('payment_method')->nullable()->after('currency');
            $table->text('payment_response')->nullable()->after('payment_method');
        });
    }

    public function down()
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->dropColumn([
                'stripe_email',
                'stripe_payment_intent_id',
                'stripe_charge_id',
                'currency',
                'payment_method',
                'payment_response'
            ]);
        });
    }
};
