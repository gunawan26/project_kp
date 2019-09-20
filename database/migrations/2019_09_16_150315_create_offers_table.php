<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('number')->nullable();
            $table->date('date')->nullable();
            $table->string('customername')->nullable();
            $table->date('discussion_date')->nullable();
            $table->string('discussion_loc')->nullable();
            $table->string('offername')->nullable();
            $table->double('offerprice')->nullable();
            $table->string('pricename')->nullable();
            $table->integer('duration')->nullable();
            $table->string('attachmentname')->nullable();
            $table->double('total')->nullable();
            $table->bigInteger('user')->unsigned()->nullable();

            $table->foreign('user')->references('id')->on('users');
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
        Schema::dropIfExists('offers');
    }
}
