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
            $table->foreignId('branch_id')->constrained('branches')->onDelete('cascade');
            $table->string('hall')->nullable();
            $table->date('date');
            $table->time('time');
            $table->enum('status', ['Showing_now','Coming_soon','out'])->default('Coming_soon');
            $table->timestamps();
            $table->foreign('movie_id')->references('id')->on('movies')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('show_times');
    }
};
