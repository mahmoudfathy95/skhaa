<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('first_name',255)->nullable();
            $table->string('last_name',255)->nullable();
            $table->string('image',255)->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('phone')->unique();
            $table->string('code',255);
            $table->string('password')->nullable();
            $table->boolean('status')->default(0);
            $table->string('firebase_token')->nullable();
            $table->string('api_token', 80)->unique()->nullable()->default(null);

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
        Schema::dropIfExists('clients');
    }
}
