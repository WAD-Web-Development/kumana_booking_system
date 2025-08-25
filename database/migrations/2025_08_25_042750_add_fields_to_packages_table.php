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
        Schema::table('packages', function (Blueprint $table) {
            $table->string('entrance')->nullable()->after('room_type_id');
            $table->string('safari_duration')->nullable()->after('entrance');
            $table->text('animal_sighting')->nullable()->after('safari_duration');
            $table->decimal('hotel_distance', 8, 2)->nullable()->after('animal_sighting');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('packages', function (Blueprint $table) {
            $table->dropColumn(['entrance', 'safari_duration', 'animal_sighting', 'hotel_distance']);
        });
    }
};
