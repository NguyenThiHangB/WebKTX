<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id', 10);
            $table->string('name', 50);
            $table->integer('row_id')->unsigned();
            $table->foreign('row_id')->references('id')->on('rows')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('type_room_id')->unsigned();
            $table->foreign('type_room_id')->references('id')->on('type_rooms')->onUpdate('cascade')->onDelete('cascade');
            $table->string('numnber_student_max', 20);
            $table->string('numnber_student_present', 20);
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
        Schema::dropIfExists('rooms');
    }
}
