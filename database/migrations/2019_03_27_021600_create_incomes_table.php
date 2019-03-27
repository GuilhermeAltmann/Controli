<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incomes', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->bigInteger('category_id');
            $table->bigInteger('account_id');

            $table->date('income_date');
            $table->string('description', 60);
            $table->decimal('amount', 8, 2);
            $table->boolean('received');

            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('account_id')->references('id')->on('accounts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incomes');
    }
}
