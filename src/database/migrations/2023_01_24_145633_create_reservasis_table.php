<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservasis', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('reserverid');
            $table->string('fullname');
            $table->bigInteger('phone');
            $table->string('email');
            $table->integer('floornum');
            $table->string('room_name');
            $table->dateTime('start');
            $table->dateTime('end');
            $table->string('organization');
            $table->string('pic_position');
            $table->string('event_name');
            $table->string('event_category');
            $table->string('event_description');
            $table->string('suratpath')->nullable();
            $table->integer('status')->default('1');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservasis');
    }
};
