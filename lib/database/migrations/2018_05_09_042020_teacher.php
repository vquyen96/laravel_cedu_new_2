<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Teacher extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher', function (Blueprint $table) {
            $table->increments('tea_id');
            $table->tinyInteger('tea_templace');
            $table->string('tea_img_head');
            $table->string('tea_img_foot');

            $table->integer('tea_gender');
            $table->string('tea_specialize');
            $table->string('tea_degree');
            $table->string('tea_email');
            $table->string('tea_fb');
            $table->float('tea_rating', 1, 1)->default(0.0);
            $table->integer('tea_follow');
            $table->integer('tea_lesson');
            $table->integer('tea_exp');
            $table->string('tea_work_place');

            $table->integer('tea_acc_id')->unsigned();
            $table->foreign('tea_acc_id')
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
        Schema::dropIfExists('teacher');
    }
}
