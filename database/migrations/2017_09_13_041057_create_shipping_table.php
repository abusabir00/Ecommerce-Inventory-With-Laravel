<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShippingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping', function (Blueprint $table) {
        $table->increments('id');
        $table->string('country');
        $table->string('fname');
        $table->string('lname');
        $table->string('addr1');
        $table->string('addr2');
        $table->string('city');
        $table->integer('postCode');
        $table->string('email');
        $table->string('phone');
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
        Schema::dropIfExists('shipping');
    }
}
