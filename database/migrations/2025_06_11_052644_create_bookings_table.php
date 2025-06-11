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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('package_id');
            $table->unsignedBigInteger('user_id');
            $table->date('start_date');
            $table->date('end_date');
            $table->tinyInteger('is_full_day')->nullable();
            $table->string('day_time')->nullable();
            $table->integer('num_of_passengers')->default(0);
            $table->integer('num_of_passengers_visa')->default(0);
            $table->integer('num_of_passengers_residential')->default(0);
            $table->text('pick_up_address')->nullable();
            $table->decimal('pickup_latitude', 10, 7)->nullable();
            $table->decimal('pickup_longitude', 10, 7)->nullable();
            $table->unsignedBigInteger('room_type_id')->nullable();
            $table->integer('number_of_rooms')->default(0);
            $table->string('customer_name');
            $table->string('customer_contact_number');
            $table->text('note')->nullable();
            $table->decimal('price', 10, 2)->default(0.00);
            $table->string('currency_code', 10)->default('LKR');
            $table->string('status')->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
