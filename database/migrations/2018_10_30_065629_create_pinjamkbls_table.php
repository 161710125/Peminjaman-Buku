<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePinjamkblsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pinjamkbls', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nopjkb', 10);
            $table->integer('id_agt')->unsigned();
            $table->foreign('id_agt')->references('id')->on('anggotas')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('id_buku')->unsigned();
            $table->foreign('id_buku')->references('id')->on('bukus')->onUpdate('cascade')->onDelete('cascade');
            $table->date('tglpjm');
            $table->date('tglhrskbl');
            $table->date('tglkbl');
            $table->double('denda');
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
        Schema::dropIfExists('pinjamkbls');
    }
}
