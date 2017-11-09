<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSetWorkout extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('set_workout', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('set_id');
            $table->unsignedInteger('workout_id');
            $table->foreign('set_id')->references('id')->on('set')->onDelete('cascade');
            $table->foreign('workout_id')->references('id')->on('workout')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('set_workout');
    }
}
