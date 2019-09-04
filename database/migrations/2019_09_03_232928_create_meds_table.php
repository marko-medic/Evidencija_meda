<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('med', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("naziv");
            $table->string("boja");
            $table->unsignedBigInteger("vrsta_meda_id");
            $table->string("kolicina");
            $table->string("opis");
            $table->foreign('vrsta_meda_id')->references('id')->on('VrstaMeda');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('med');
    }
}
