<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount', 10, 2);
            $table->enum('payment_status', ['cancelled', 'pending', 'approved'])->default('pending');
            $table->timestamp('payment_date');
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // FK to users table
            $table->foreignId('order_id')->constrained()->onDelete('cascade'); // FK to orders table
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
}

