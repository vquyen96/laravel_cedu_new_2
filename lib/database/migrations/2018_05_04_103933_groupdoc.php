<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Groupdoc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groupdoc', function (Blueprint $table) {
            $table->increments('grdoc_id');
            $table->string('grdoc_name');
            $table->string('grdoc_slug');
            $table->integer('grdoc_gr_id')->unsigned();
            $table->foreign('grdoc_gr_id')
                ->references('gr_id')
                ->on('groups')
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
        Schema::dropIfExists('groupdoc');
    }
}
