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
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique;
            $table->date('day');
            $table->time('start');
            $table->time('end');
            $table->unsignedBigInteger('faculties_id');
            $table->unsignedBigInteger('courses_id');
            $table->unsignedBigInteger('venues_id');
            $table->unsignedBigInteger('subjects_id');
            $table->timestamps();

            $table->foreign('faculties_id')->references('id')->on('faculties');
            $table->foreign('courses_id')->references('id')->on('courses');
            $table->foreign('venues_id')->references('id')->on('venues');
            $table->foreign('subjects_id')->references('id')->on('subjects');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classes');
    }
};
