<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Comment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment', function (Blueprint $table) {
            $table->increments('com_id');
            $table->tinyInteger('com_star');
            $table->string('com_title');
            $table->string('com_content');
            $table->integer('com_acc_id')->unsigned();
            $table->foreign('com_acc_id')
                ->references('id')
                ->on('accounts')
                ->onDelete('cascade');

            $table->integer('com_cou_id')->unsigned();
            $table->foreign('com_cou_id')
                ->references('cou_id')
                ->on('course')
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
        Schema::dropIfExists('comment');
    }
}
