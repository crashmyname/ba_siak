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
        Schema::create('suratkeluar', function (Blueprint $table) {
            $table->id('suratkeluar_id');
            $table->string('no_suratkeluar');
            $table->datetime('tgl_terima');
            $table->datetime('tgl_pembuatan');
            $table->string('no_po');
            // $table->bigInteger('product_id');
            // $table->string('nama_supplier');
            $table->string('no_invoice');
            $table->string('no_faktur');
            $table->bigInteger('nominal');
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suratkeluar');
    }
};
