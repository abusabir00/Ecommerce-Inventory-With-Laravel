<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessengerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messenger', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->tinyInteger('from_id')->unsigned();
            $table->tinyInteger('to_id')->unsigned();
            $table->tinyInteger('conv_id')->unsigned();
            $table->boolean('status')->unsigned();
            $table->text('messege');
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
        Schema::dropIfExists('messenger');
    }
}
