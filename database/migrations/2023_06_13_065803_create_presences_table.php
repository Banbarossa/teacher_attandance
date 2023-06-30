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
        Schema::create('presences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teacher_id')->constrained()->cascadeOnDelete();
            $table->foreignId('schedule_id')->constrained();
            $table->uuid('rombel_id');
            $table->foreign('rombel_id')->references('id')->on('rombels')->onDelete('cascade');
            $table->integer('jumlah_jam');
            $table->date('tanggal')->nullable();
            $table->time('waktu')->nullable();
            $table->integer('terlambat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presences');
    }
};
