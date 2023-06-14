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
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('subjectCode')->unique;
            $table->string('subjectName');
            $table->integer('hours');
            $table->unsignedBigInteger('users_id');
            $table->unsignedBigInteger('faculties_id');
            $table->unsignedBigInteger('courses_id');
            $table->timestamps();

            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('faculties_id')->references('id')->on('faculties');
            $table->foreign('courses_id')->references('id')->on('courses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subjects');
    }
};
