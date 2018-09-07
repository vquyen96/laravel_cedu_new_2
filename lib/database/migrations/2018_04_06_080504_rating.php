<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Rating extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rating', function (Blueprint $table) {
            $table->increments('rat_id');
            $table->tinyInteger('rat_star');
            $table->string('rat_title');
            $table->string('rat_content');
            $table->integer('rat_acc_id')->unsigned();
            $table->foreign('rat_acc_id')
                ->references('id')
                ->on('accounts')
                ->onDelete('cascade');

            $table->integer('rat_cou_id')->unsigned();
            $table->foreign('rat_cou_id')
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
        Schema::dropIfExists('rating');
    }
}
