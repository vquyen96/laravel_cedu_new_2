<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TeacherRating extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_rating', function (Blueprint $table) {
            $table->increments('tr_id');
            $table->integer('tr_rate');

            $table->integer('tr_tea_id')->unsigned();
            $table->foreign('tr_tea_id')
                ->references('tea_id')
                ->on('teacher')
                ->onDelete('cascade');

            $table->integer('tr_acc_id')->unsigned();
            $table->foreign('tr_acc_id')
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
        Schema::dropIfExists('teacher_rating');
    }
}
