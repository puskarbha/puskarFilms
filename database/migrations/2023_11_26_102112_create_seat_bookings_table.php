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
        Schema::create('seat_bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('movie_id')->nullable();
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->unsignedBigInteger('show_time_id')->nullable();
            $table->integer('seat_no');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->enum('reservation_status', ['available','reserved','sold'])->default('available');
            $table->timestamps();
            $table->foreign('movie_id')->references('id')->on('movies')->onDelete('set null');
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('set null');
            $table->foreign('show_time_id')->references('id')->on('show_times')->onDelete('set null');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seat_bookings');
    }
};
