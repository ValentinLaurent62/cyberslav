<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoireTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histoire', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('titre');
            $table->text('pitch');
            $table->string('photo');
            $table->integer('genre_id')->nullable();
            $table->integer('active');
            $table->timestamps();
            /*$table->foreign('user_id')->references('id')->on('users');
            $table->foreign('genre_id')->references('id')->on('genre');
            */
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('histoire');
    }
}
