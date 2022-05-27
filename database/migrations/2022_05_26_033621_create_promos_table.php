<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promos', function (Blueprint $table) {
            $table->integer('id', true, true);
            $table->text('kode_promo');
            $table->date('startdate');
            $table->date('end_date');
            $table->integer('diskon');
            $table->integer('min_belanja');
            $table->integer('id_paket')->unsigned();
            $table->foreign('id_paket')->references('id')->on('pakets');
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
        Schema::dropIfExists('promos');
    }
}
