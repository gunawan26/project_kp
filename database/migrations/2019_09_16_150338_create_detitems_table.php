<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detitems', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('offer')->unsigned();
            $table->bigInteger('category')->unsigned();
            $table->bigInteger('subcategory')->unsigned();
            $table->string('item');
            $table->integer('duration');
            $table->enum('unit', array('hour', 'day', 'month', 'year'));
            $table->double('itemprice');
            $table->string('information');

            $table->foreign('offer')->references('id')->on('offers');
            $table->foreign('category')->references('id')->on('categories');
            $table->foreign('subcategory')->references('id')->on('subcategories');
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
        Schema::dropIfExists('detitems');
    }
}
