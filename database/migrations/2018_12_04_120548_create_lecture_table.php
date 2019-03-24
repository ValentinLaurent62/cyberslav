<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLectureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lecture', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('histoire_id');
            $table->integer('chapitre_id');
            $table->integer('num_sequence');
            $table->timestamps();
            //$table->foreign('histoire_id')->references('id')->on('histoire');
            //$table->foreign('user_id')->references('id')->on('users');
            //$table->foreign('chapitre_id')->references('id')->on('chapitre');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lecture');
    }
}
