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
        Schema::create('karya_files', function (Blueprint $table) {
            $table->id();
            $table->foreignId('karya_id')->constrained()->onDelete('cascade');
            $table->string('file_path');
            $table->string('format')->nullable(); // optional: pdf, jpg, mp4
            $table->unsignedBigInteger('size')->nullable(); // ukuran dalam byte
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karya_files');
    }
};
