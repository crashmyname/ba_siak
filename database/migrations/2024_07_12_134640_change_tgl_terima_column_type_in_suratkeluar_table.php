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
        Schema::table('suratkeluar', function (Blueprint $table) {
            $table->date('tgl_terima')->change();
            $table->date('tgl_pembuatan')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('suratkeluar', function (Blueprint $table) {
            Schema::dropIfExists('suratkeluar');
        });
    }
};
