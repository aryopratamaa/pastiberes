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
        Schema::create('bengkels', function (Blueprint $table) {
            $table->id();

            $table->string('namabengkel', 255)->unique();
            $table->string('alamat', 255);
            $table->text('deskripsi')->nullable();

            // Foreign Key ke tipe_layanan
            $table->foreignId('tipeID')
                ->constrained('tipe_layanans')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bengkels');
    }
};
