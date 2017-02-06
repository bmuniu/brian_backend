<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddtionalCostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('additional_costs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('travel_plan_id')->unsigned();
            $table->foreign('travel_plan_id')
                ->references('id')
                ->on('travel_plans')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('person_name');
            $table->double('travel_cost');
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
        Schema::dropIfExists('addtional_costs');
    }
}
