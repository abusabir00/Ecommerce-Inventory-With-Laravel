<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderProduct', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('orderId');
            $table->integer('productId');
            $table->string('productName');
            $table->string('productColor');
            $table->string('productSize');
            $table->float('productPrice', 10,2);
            $table->integer('productQuantity');
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
        Schema::dropIfExists('orderProduct');
    }
}
