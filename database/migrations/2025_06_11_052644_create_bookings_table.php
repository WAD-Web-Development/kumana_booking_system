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
            $table->unsignedBigInteger('temp_booking_id');
            $table->decimal('location_lat', 10, 7)->nullable();
            $table->decimal('location_lng', 10, 7)->nullable();
            $table->text('address')->nullable();
            $table->date('safari_date')->nullable();
            $table->tinyInteger('is_full_day')->nullable();
            $table->string('safari_time')->nullable();
            $table->integer('number_of_customers')->nullable()->default(1);
            $table->integer('residence_visa')->nullable()->default(0);
            $table->integer('travel_visa')->nullable()->default(0);
            $table->unsignedBigInteger('room_type_id')->nullable();
            $table->date('room_check_in_date')->nullable();
            $table->date('room_check_out_date')->nullable();
            $table->integer('number_of_rooms')->nullable()->default(0);
            $table->string('customer_name');
            $table->string('contact_no', 20);
            $table->decimal('price', 10, 2)->nullable();
            $table->string('currency', 10)->default('LKR');
            $table->text('note')->nullable();
            $table->string('status')->default('Pending');
            $table->tinyInteger('is_paid')->default(0);
            $table->string('reference_id')->nullable();
            $table->timestamp('confirmed_at')->nullable();
            $table->timestamp('cancelled_at')->nullable();
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
