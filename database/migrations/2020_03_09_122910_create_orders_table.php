<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();

            $table->string('broj_narudzbe')->unique();
            $table->unsignedInteger('user_id');
            $table->float('ukupna_cijena');
            $table->integer('kolicina');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->enum('nacin_placanja', ['placanje_pouzecem', 'kartica'])->default('placanje_pouzecem');

            $table->string('ime');
            $table->string('prezime');
            $table->text('adresa');
            $table->string('grad');
            $table->string('postanski_broj');
            $table->string('telefon');
            $table->text('napomena');

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
