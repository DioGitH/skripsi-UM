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
            Schema::create('users', function (Blueprint $table) {
                $table->id(); // Primary key, auto increment
                $table->string('name', 100);
                $table->string('password'); // Laravel default length is 255
                $table->string('email', 150)->unique();
                $table->enum('profesi', ['guru', 'siswa']);
                $table->string('mata_pelajaran', 100)->nullable();
                $table->enum('kelas', ['10', '11', '12'])->nullable();
                $table->string('jurusan', 100)->nullable();
                $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
