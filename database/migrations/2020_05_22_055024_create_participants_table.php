<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('organization');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone_num');
            $table->integer('member_type');
            $table->bigInteger('track_id')->unsigned()->index();
            $table->string('paper_id');
            $table->integer('present_method');
            $table->tinyInteger('verify_status')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('track_id')->references('id')->on('tracks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('participants');
    }
}
