<?php

// database/migrations/xxxx_xx_xx_create_extra_charges_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ExtraChargesTable extends Migration
{
    public function up()
    {
        Schema::create('extra_charges', function (Blueprint $table) {
            $table->id('chargeID');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('service_name'); // wash & dry, fold, etc.
            $table->integer('package_weight'); // e.g. 3, 8, 15, 30
            $table->enum('bag_size', ['small', 'medium', 'large']);
            $table->float('capacity_exceeded')->default(0); // kg
            $table->decimal('extra_charge', 8, 2)->default(0);
            $table->decimal('total_price', 8, 2); // base + extra
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('extra_charges');
    }
}

