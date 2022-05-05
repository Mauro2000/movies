<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('movie_id');
            $table->string('name')->nullable();
            $table->unsignedBigInteger('season_id');
            $table->unsignedBigInteger('episode_id');
            $table->timestamps();


            $table->foreign('movie_id')->references('id')->on('movies')->onDelete('cascade');

            $table->foreign('season_id')->references('id')->on('seasons')->onDelete('cascade');

            $table->foreign('episode_id')->references('id')->on('episodes')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('servers');
    }
}
