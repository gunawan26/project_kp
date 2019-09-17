<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThirdpartiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thirdparties', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('thirdpartyname');
            $table->double('price');
            $table->string('information');
            $table->bigInteger('offer')->unsigned();

            $table->foreign('offer')->references('id')->on('offers');
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
        Schema::dropIfExists('thirdparties');
    }
}
