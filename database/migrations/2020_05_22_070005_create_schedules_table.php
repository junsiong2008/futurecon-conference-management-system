<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->time('start_time');
            $table->string('title');
            $table->string('subtitle');
            $table->bigInteger('track_id')->unsigned()->index();
            $table->bigInteger('speaker_id')->unsigned()->index()->nullable();
            $table->timestamps();

            $table->foreign('track_id')->references('id')->on('tracks');
            $table->foreign('speaker_id')->references('id')->on('speakers');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
}
