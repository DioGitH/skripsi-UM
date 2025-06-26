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
        Schema::create('karyas', function (Blueprint $table) {
            $table->id();
                $table->foreignId('user_id')->constrained()->onDelete('cascade');
                $table->foreignId('jenis_karya_id')->constrained('jenis_karyas')->onDelete('cascade');

                // Metadata
                $table->string('title');
                $table->string('subject')->nullable();
                $table->text('description')->nullable();
                $table->string('creator')->nullable();
                $table->string('source')->nullable();
                $table->string('publisher')->nullable();
                $table->date('date')->nullable();
                $table->string('contributor')->nullable();
                $table->string('rights')->nullable();
                $table->string('relation')->nullable();
                $table->string('language')->nullable(); // pdf, jpg, mp4, etc.
                $table->integer('identifier')->nullable(); // DOI, link, atau kode
                $table->enum('status', ['Menunggu', 'Terpublish', 'Ditolak','Arsip']);
                $table->string('coverage')->nullable();
                $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyas');
    }
};
