<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name' , 255);
            $table->string('image' , 255);
            $table->string('email')->unique();
            $table->string('phone' , 255);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password' , 255);
            $table->tinyInteger('role')->default(0)->nullable(); // 0 la client 1 la admin 
            $table->rememberToken();
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
        Schema::dropIfExists('Users');
    }
}
