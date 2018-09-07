<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Doc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doc', function (Blueprint $table) {
            $table->increments('doc_id');
            $table->string('doc_name');
            $table->string('doc_img');
            $table->string('doc_link');
            $table->integer('doc_gr_id')->unsigned();
            $table->foreign('doc_gr_id')
                ->references('gr_id')
                ->on('groups')
                ->onDelete('cascade');
            $table->integer('doc_acc_id')->unsigned();
            $table->foreign('doc_acc_id')
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
        Schema::dropIfExists('doc');
    }
}
