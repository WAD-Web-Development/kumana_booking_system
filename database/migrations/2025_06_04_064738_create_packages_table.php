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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->mediumText('description')->nullable();
            $table->mediumText('note')->nullable();
            $table->tinyInteger('is_active')->default(1);
            $table->string('image_path', 2048)->nullable();
            $table->tinyInteger('is_special')->default(0);
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->tinyInteger('type')->comment('1 = Safari, 2 = Room, 3 = Safari & Room');

            // Type-specific fields
            $table->string('safari_type')->nullable();//half day, full day
            $table->integer('safari_max_people_count')->nullable();
            $table->unsignedBigInteger('room_type_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
