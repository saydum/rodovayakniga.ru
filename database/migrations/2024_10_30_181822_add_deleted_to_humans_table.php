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
        Schema::table('humans', function (Blueprint $table) {
            $table->boolean('deleted')->default(false)->comment('Y - yes, N - no');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('humans', function (Blueprint $table) {
            $table->dropColumn('deleted');
        });
    }
};
