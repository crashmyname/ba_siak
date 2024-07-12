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
        Schema::create('suratmasuk', function (Blueprint $table) {
            $table->id('suratmasuk_id');
            $table->string('no_suratmasuk');
            $table->datetime('tgl_terima');
            $table->datetime('tgl_pembuatan');
            $table->string('no_po');
            $table->bigInteger('product_id');
            $table->string('nama_supplier');
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
        Schema::dropIfExists('suratmasuk');
    }
};
