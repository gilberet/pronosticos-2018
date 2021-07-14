<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFasesgruposTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fasesgrupos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('grupo');
            $table->date('fecha');
            $table->string('hora');
            $table->integer('estado')->default(0);
            $table->integer('equipocasa_id')->unsigned();
            $table->integer('equipofuera_id')->unsigned();
            $table->integer('golcasa')->nullable()->default(0);
            $table->integer('golfuera')->nullable()->default(0);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('equipocasa_id')->references('id')->on('equipos');
            $table->foreign('equipofuera_id')->references('id')->on('equipos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('fasesgrupos');
    }
}
