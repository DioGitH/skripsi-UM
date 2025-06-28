<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Hapus user_id dari jenis_karyas
        Schema::table('jenis_karyas', function (Blueprint $table) {
            if (Schema::hasColumn('jenis_karyas', 'user_id')) {
                $table->dropForeign(['user_id']); // drop foreign key dulu
                $table->dropColumn('user_id');
            }
        });

        // Tambahkan user_id ke karyas
        Schema::table('karyas', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable()->after('id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down(): void
    {
        // Tambahkan kembali user_id ke jenis_karyas
        Schema::table('jenis_karyas', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable()->after('id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });

        // Hapus user_id dari karyas
        Schema::table('karyas', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};
