<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Code extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('code', function (Blueprint $table) {
            $table->increments('code_id');
            $table->integer('code_value');
            $table->integer('code_orderDe_id')->unsigned();
            $table->foreign('code_orderDe_id')
                ->references('orderDe_id')
                ->on('orderdetail')
                ->onDelete('cascade');
            $table->integer('code_status');    
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
        Schema::dropIfExists('code');
    }
}
