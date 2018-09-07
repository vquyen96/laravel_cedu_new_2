<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Aff extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aff', function (Blueprint $table) {
            $table->increments('aff_id');
            $table->string('aff_code');
            $table->integer('aff_acc_id')->unsigned();
            $table->foreign('aff_acc_id')
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
        Schema::dropIfExists('aff');
    }
}
