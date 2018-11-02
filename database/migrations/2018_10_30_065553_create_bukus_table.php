<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBukusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bukus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_jb')->unsigned();
            $table->foreign('id_jb')->references('id')->on('jnbukus')->onUpdate('cascade')->onDelete('cascade');
            $table->string('judul', 100);
            $table->string('pengarang', 100);
            $table->string('isbn', 25);
            $table->string('thnterbit', 4);
            $table->string('penerbit', 50);
            $table->integer('tersedia');
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
        Schema::dropIfExists('bukus');
    }
}
