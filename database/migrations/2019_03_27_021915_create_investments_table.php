<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvestmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investments', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('category_investment_id')->unsigned();
            $table->integer('type_investment_id')->unsigned();

            $table->date('initial_date');
            $table->date('final_date');
            //$table->string('category', 8, 2);
            $table->decimal('amount', 8, 2);
            $table->char('risk', 1);
            $table->timestamps();

            $table->foreign('category_investment_id')->references('id')->on('categories_investment');
            $table->foreign('type_investment_id')->references('id')->on('types_investment');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('investments');
    }
}
