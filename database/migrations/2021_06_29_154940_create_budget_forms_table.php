<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBudgetFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('budget_forms', function (Blueprint $table) {
            $table->bigIncrements('id');
            //年月、日用品、食費、教養・教育、趣味・娯楽、衣服・美容、健康・医療
            $table->string('budget_date', 7);
            $table->integer('user_id')->unsigned();
            $table->integer('daily_necessities')->unsigned();
            $table->integer('food')->unsigned();
            $table->integer('education')->unsigned();
            $table->integer('entertainment')->unsigned();
            $table->integer('clothing')->unsigned();
            $table->integer('medical')->unsigned();
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
        Schema::dropIfExists('budget_forms');
    }
}
