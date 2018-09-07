<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Lesson extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lesson', function (Blueprint $table) {
            $table->increments('les_id');
            $table->string('les_name');
            $table->string('les_slug');
            $table->string('les_link');
            $table->string('les_video_duration');
            $table->integer('les_part_id')->unsigned();
            $table->foreign('les_part_id')
                ->references('part_id')
                ->on('part')
                ->onDelete('cascade');

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
        Schema::dropIfExists('lesson');
    }
}
