<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Records extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ip');
            $table->string('session_id');
            $table->timestamps();
            $table->double('expenditures');
            $table->double('personal_account');
            $table->double('reserves');
            $table->double('resources');
            $table->integer('risk_contractors');
            $table->integer('risk_police');
            $table->integer('risk_political');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
