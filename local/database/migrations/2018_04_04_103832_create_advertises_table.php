<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertises', function (Blueprint $table) {
            $table->increments('id', 10);
            $table->string('name', 50);
            $table->integer('advertiser_id')->unsigned();
            $table->foreign('advertiser_id')->references('id')->on('advertisers')->onUpdate('cascade')->onDelete('cascade');
            $table->string('image', 20);
            $table->string('width', 255);
            $table->string('height', 255);
            $table->string('link', 255);
            $table->string('target', 255);
            $table->tinyInteger('position');
            $table->integer('type_new_id')->unsigned();
            $table->foreign('type_new_id')->references('id')->on('type_news')->onUpdate('cascade')->onDelete('cascade');
            $table->string('click', 255);
            $table->string('ord', 255);
            $table->tinyInteger('status');
            $table->string('money', 255);
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
        Schema::dropIfExists('advertises');
    }
}
