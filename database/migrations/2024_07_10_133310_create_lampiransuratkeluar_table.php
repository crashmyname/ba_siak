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
        Schema::create('lampiransuratkeluar', function (Blueprint $table) {
            $table->id('lampiran_id');
            $table->bigInteger('suratkeluar_id');
            $table->string('nama_file');
            $table->string('tipe_file');
            $table->string('path_file');
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lampiransuratkeluar');
    }
};
