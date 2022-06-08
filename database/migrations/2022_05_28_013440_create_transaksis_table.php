<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama', 255);
            $table->text('alamat');
            $table->string('no_tlpn', 20);
            $table->date('tanggal_layanan');
            $table->integer('status_pemesanan');
            $table->integer('id_paket')->unsigned();
            $table->foreign('id_paket')->references('id')->on('pakets');
            $table->integer('total_harga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
}
