<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->increments('id', 10);
            $table->string('name', 50);
            $table->string('num_elec_old', 50);
            $table->string('num_elec_new', 50);
            $table->string('num_water_old', 50);
            $table->string('num_water_new', 50);
            $table->integer('price_id')->unsigned();
            $table->foreign('price_id')->references('id')->on('prices')->onUpdate('cascade')->onDelete('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('bills');
    }
}
