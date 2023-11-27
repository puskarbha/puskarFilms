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
        Schema::create('show_times', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('movie_id')->nullable();
            $table->integer('duration');
            $table->time('time');
            $table->string("status");
            $table->timestamps();
            $table->foreign('movie_id')->references('id')->on('movies')->onDelete('set null');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('show_times');
    }
};
