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
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("mobil_id");
            $table->unsignedBigInteger("layanan_id");
            $table->string("nama");
            $table->integer("no_hp");
            $table->date("tanggal_keberangkatan");
            $table->time("jam_berangkat");
            $table->string("titik_jemput");
            $table->string("titik_antar");  
            $table->string("metode_pembayaran");
            $table->boolean("konfirmasi_pembayaran")->default(false);
            $table->integer("nomor_kursi");
            $table->integer("harga");
            $table->integer("total_tagihan");
            $table->timestamps();

            $table->foreign("mobil_id")->references("id")->on("mobils")->onDelete("cascade");
            $table->foreign("layanan_id")->references("id")->on("layanans")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
