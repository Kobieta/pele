<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
//            $table->increments('id');
//            $table->string('name',255);
//            $table->tinyInteger('styling',2);
//            $table->integer('users_id')->unsigned();
//            $table->foreign('users_id')->references('id')->on('users')
//                ->onDelete('restrict');
//            $table->timestamps();


            $table->increments('id');
            $table->string('name', 255);
            $table->tinyInteger('styling');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('restrict');
//          $table->string('email')->unique();
    //      $table->string('password');
    //      $table->string('avatar')->nullable();
    //      $table->rememberToken();
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
        Schema::dropIfExists('listings');
    }
}
