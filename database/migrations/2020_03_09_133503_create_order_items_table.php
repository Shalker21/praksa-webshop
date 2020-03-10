<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('narudzba_id');
            $table->unsignedBigInteger('artikl_id');

            $table->foreign('narudzba_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('artikl_id')->references('id')->on('products')->onDelete('cascade');

            $table->float('cijena');
            $table->integer('kolicina');

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
        Schema::dropIfExists('order_items');
    }
}
