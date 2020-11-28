<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('shipping');
            $table->string('subTotal');
            $table->string('discount');
            $table->string('total');
            $table->string('address_id');
            $table->string('payment');

            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('branch_id');

            $table->string('coupon')->nullable();
            $table->string('city')->nullable();
            $table->string('street')->nullable();
            $table->string('street_description')->nullable();

            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');

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
        Schema::dropIfExists('orders');
    }
}
