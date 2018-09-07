<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Story extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('story', function (Blueprint $table) {
            $table->increments('sto_id');
            $table->string('sto_title');
            $table->string('sto_img');
            $table->text('sto_content');

            $table->integer('sto_tea_id')->unsigned();
            $table->foreign('sto_tea_id')
                ->references('tea_id')
                ->on('teacher')
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
        Schema::dropIfExists('story');
    }
}
