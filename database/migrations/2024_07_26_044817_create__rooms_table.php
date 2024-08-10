<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Rooms', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('image'  , 255);
            $table->decimal('price', 12 , 2);  // đã thay đổi thành 3 bằng tay trong csdl mysql
            $table->string('description' , 255);
            $table->tinyInteger('status')->default(0)->nullable(); // mặc định là 0 có thể thuê
            $table->foreignId('KindRomm_id')->references('id')->on('KindRooms');
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
        Schema::dropIfExists('Rooms');
    }
}
