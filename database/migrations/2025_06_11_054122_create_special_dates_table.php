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
        Schema::create('special_dates', function (Blueprint $table) {
            $table->id();
            $table->date('start_date');
            $table->date('end_date');
            $table->string('title');
            $table->text('description')->nullable();
            $table->tinyInteger('is_full_day')->default(1);
            $table->string('day_time')->nullable();
            $table->string('image_path', 2048)->nullable();
            $table->tinyInteger('is_closed')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('special_dates');
    }
};
