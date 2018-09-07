<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Course extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course', function (Blueprint $table) {
            $table->increments('cou_id');
            $table->string('cou_name');
            $table->string('cou_slug');
            $table->string('cou_img');
            $table->integer('cou_price');
            $table->string('cou_level');
            $table->string('cou_lesson');
            $table->integer('cou_video');
            $table->tinyInteger('cou_star');
            $table->text('cou_content');
            $table->integer('cou_gr_id')->unsigned();
            $table->foreign('cou_gr_id')
                ->references('gr_id')
                ->on('groups')
                ->onDelete('cascade');
            $table->integer('cou_tea_id')->unsigned();
            $table->foreign('cou_tea_id')
                ->references('id')
                ->on('accounts')
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
        Schema::dropIfExists('course');
    }
}
