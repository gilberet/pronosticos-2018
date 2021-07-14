<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateapuestasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apuestas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fasegrupo_id')->unsigned();
            $table->integer('golcasa')->default(0);
            $table->integer('golfuera')->default(0);
            $table->integer('gano')->default(0);
            $table->integer('estado')->default(0);
            $table->integer('user_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('fasegrupo_id')->references('id')->on('fasesgrupos');
            $table->foreign('user_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('apuestas');
    }
}
