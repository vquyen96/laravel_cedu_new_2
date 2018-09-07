<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Order extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->increments('ord_id');
            $table->tinyInteger('ord_payment');
            $table->integer('ord_total_price');
            $table->integer('ord_acc_id')->unsigned();
            $table->foreign('ord_acc_id')
                ->references('id')
                ->on('accounts')
                ->onDelete('cascade');
            $table->string('ord_phone');
            $table->string('ord_adress');
            $table->text('ord_note');
            $table->tinyInteger('ord_status');
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
        Schema::dropIfExists('order');
    }
}
