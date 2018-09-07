<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AccountRequest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_request', function (Blueprint $table) {
            $table->increments('req_id');
            $table->integer('req_status');
            $table->integer('req_acc_id')->unsigned();
            $table->foreign('req_acc_id')
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
        Schema::dropIfExists('account_request');
    }
}
