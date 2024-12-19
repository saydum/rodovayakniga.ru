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
        Schema::create('humans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('last_name')->nullable();
            $table->string('surname')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('image', 550)->nullable();

            $table->unsignedBigInteger('mother_id')->nullable();
            $table->unsignedBigInteger('father_id')->nullable();

            $table->foreign('mother_id')->references('id')->on('humans')->onDelete('set null');
            $table->foreign('father_id')->references('id')->on('humans')->onDelete('set null');

            $table->unsignedBigInteger('rod_id')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('humans');
    }
};
