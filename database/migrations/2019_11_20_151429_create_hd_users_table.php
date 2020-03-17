<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHdUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hd_users', function (Blueprint $table) {
            $table->increments('id');
            $table->char('first_name', 255);
            $table->char('middle_name', 255);
            $table->char('last_name', 255);
            $table->text('password');
            $table->char('email', 255);
            $table->char('phone_number', 255);
            $table->integer('city_id')->unsigned();
            $table->text('foto')->nullable();
            $table->tinyInteger('validate')->default('0');
            $table->date('date_last_login');
            $table->timestamps();

            // если может быть значение null добавляется ->nullable()

            // внешние ключи
            //$table->foreign('city_id')->references('id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hd_users');
    }
}
