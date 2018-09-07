<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Orderdetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderdetail', function (Blueprint $table) {
            $table->increments('orderDe_id');
            $table->string('orderDe_name');
            $table->integer('orderDe_price');
            $table->integer('orderDe_qty');
            $table->integer('orderDe_ord_id')->unsigned();
            $table->foreign('orderDe_ord_id')
                ->references('ord_id')
                ->on('order')
                ->onDelete('cascade');
            $table->integer('orderDe_cou_id')->unsigned();
            $table->foreign('orderDe_cou_id')
                ->references('cou_id')
                ->on('course')
                ->onDelete('cascade');
            $table->integer('orderDe_aff_id')->unsigned();
            $table->foreign('orderDe_aff_id')
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
        Schema::dropIfExists('orderdetail');
    }
}
