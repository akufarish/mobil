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
        Schema::create('layanans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("mobil_id");
            $table->string("nama_paket");
            $table->string("deskripsi");
            $table->integer("harga");
            $table->timestamps();

            $table->foreign("mobil_id")->references("id")->on("mobils");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('layanans');
    }
};
