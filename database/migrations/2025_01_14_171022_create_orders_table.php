<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Orders table
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            // Add unique reference number
            $table->string('reference_number')->unique();
            $table->string('address');
            $table->date('pickup_date');
            $table->time('pickup_time');
            $table->string('delivery_timing');

            $table->unsignedBigInteger('driver_id')->nullable();
            $table->foreign('driver_id')
                  ->references('user_id')
                  ->on('deliveries')
                  ->onDelete('set null');

            $table->decimal('total_amount', 10, 2)->default(0.00);
            $table->enum('order_status', ['pending', 'processing', 'completed', 'cancelled'])->default('pending');
            $table->text('remark')->nullable();

            $table->timestamps();
        });

        // Ordered services table
        Schema::create('ordered_services', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')
                  ->references('id')
                  ->on('orders')
                  ->onDelete('cascade');

            $table->unsignedBigInteger('service_id');
            $table->foreign('service_id')
                  ->references('id')
                  ->on('service_management')
                  ->onDelete('cascade');

            $table->decimal('price', 8, 2);
            $table->integer('qty')->default(1);

            // Optional selected bag size (as enum)
            $table->enum('selected_bag_size', ['small', 'medium', 'large'])->nullable();

            // Reference to service_bag_details
            $table->unsignedBigInteger('selected_bag_size_id')->nullable();
            $table->foreign('selected_bag_size_id')
                  ->references('id')
                  ->on('service_bag_details')
                  ->onDelete('set null');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ordered_services');
        Schema::dropIfExists('orders');
    }
};


