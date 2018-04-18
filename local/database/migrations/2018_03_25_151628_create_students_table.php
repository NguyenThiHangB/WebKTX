<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id', 10);
            $table->string('code_student', 10);
            $table->string('name', 50);
            $table->date('birth');
            $table->tinyInteger('gender');
            $table->string('class', 50);
            $table->integer('cource_id')->unsigned();
            $table->foreign('cource_id')->references('id')->on('cources')->onUpdate('cascade')->onDelete('cascade');
            $table->string('identity_card', 20);
            $table->string('phone', 20);
            $table->string('address', 255);
            $table->integer('region_id')->unsigned();
            $table->foreign('region_id')->references('id')->on('regions')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('room_id')->unsigned();
            $table->foreign('room_id')->references('id')->on('rooms')->onUpdate('cascade')->onDelete('cascade');
            $table->tinyInteger('status');
            $table->string('note', 255)->nullable();
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
        Schema::dropIfExists('students');
    }
}
