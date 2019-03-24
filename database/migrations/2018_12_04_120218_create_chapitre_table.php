<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChapitreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chapitre', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titre')->nullable();
            $table->string('titrecourt');
            $table->text('texte');
            $table->string('photo')->nullable();
            $table->string('question')->nullable();
            $table->integer('histoire_id');
            $table->boolean('premier');
            $table->timestamps();
            //$table->foreign('histoire_id')->references('id')->on('histoire');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chapitre');
    }
}
