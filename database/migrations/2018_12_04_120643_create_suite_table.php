<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('suite', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('chapitre_source_id');
            $table->integer('chapitre_destination_id');
            $table->text('reponse');
            $table->timestamps();
            //$table->foreign('chapitre_source_id')->references('id')->on('chapitre');
            //$table->foreign('chapitre_destination_id')->references('id')->on('chapitre');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suite');
    }
}
