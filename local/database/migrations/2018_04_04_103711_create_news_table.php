<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id', 10);
            $table->string('title', 255);
            $table->integer('type_new_id')->unsigned();
            $table->foreign('type_new_id')->references('id')->on('type_news')->onUpdate('cascade')->onDelete('cascade');
            $table->string('image');
            $table->text('sort_content');
            $table->text('detail_content');
            $table->tinyInteger('status');
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
        Schema::dropIfExists('news');
    }
}
