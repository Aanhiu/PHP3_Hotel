<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Bookings', function (Blueprint $table) {
            $table->id();
            $table->string('fullname' , 255);
            $table->string('email' , 255);
            $table->string('phone' , 20);
            $table->string('number_person' , 255);
            $table->dateTime('check_in');
            $table->dateTime('check_out');
            $table->tinyInteger('status')->default(0)->nullable(); // 0 là chờ xác nhận

            $table->foreignId('User_id')->references('id')->on('users');
            $table->foreignId('Room_id')->references('id')->on('Rooms');

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
        Schema::dropIfExists('Bookings');
    }
}
