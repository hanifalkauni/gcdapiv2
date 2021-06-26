<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('outletId')->unsigned();
            $table->integer('itemId')->unsigned();
            $table->date('stockItemDate');
            $table->string('stockItemRemains')->nullable();
            $table->enum('stockItemStatus',['safe','danger'])->default('safe');
            $table->timestamps();

            $table->foreign('outletId')->references('id')->on('outlets');
            $table->foreign('itemId')->references('id')->on('items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock_items');
    }
}
