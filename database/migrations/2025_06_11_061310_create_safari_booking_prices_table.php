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
        Schema::create('safari_booking_prices', function (Blueprint $table) {
            $table->id();
            $table->string('visa_type');
            $table->string('group_type');
            $table->integer('person_count')->default(1);
            $table->decimal('half_day_price', 10, 2)->default(0.00);
            $table->decimal('full_day_price', 10, 2)->default(0.00);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('safari_booking_prices');
    }
};
