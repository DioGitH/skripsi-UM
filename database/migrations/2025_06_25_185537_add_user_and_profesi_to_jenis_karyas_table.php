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
        Schema::table('jenis_karyas', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null'); // Creator atau admin
            $table->foreignId('profesi_id')->nullable()->constrained('profesis')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jenis_karyas', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');

            $table->dropForeign(['profesi_id']);
            $table->dropColumn('profesi_id');
        });
    }
};
