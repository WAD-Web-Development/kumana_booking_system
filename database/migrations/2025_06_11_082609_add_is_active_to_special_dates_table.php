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
        Schema::table('special_dates', function (Blueprint $table) {
            $table->tinyInteger('is_active')->default(1)->after('is_closed');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('special_dates', function (Blueprint $table) {
            $table->dropColumn('is_active');
        });
    }
};
