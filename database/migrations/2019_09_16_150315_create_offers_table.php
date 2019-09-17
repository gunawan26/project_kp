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
            $table->string('number');
            $table->date('date');
            $table->string('customername');
            $table->date('discussion_date');
            $table->string('discussion_loc');
            $table->string('offername');
            $table->double('offerprice');
            $table->string('pricename');
            $table->integer('duration');
            $table->string('attachmentname');
            $table->double('total');
            $table->bigInteger('user')->unsigned();

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
