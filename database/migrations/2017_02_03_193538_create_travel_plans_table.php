<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTravelPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travel_plans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('grade');
            $table->string('institution');
            $table->string('venue');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('days_away');
            $table->string('justification');
            $table->double('budget_line');
            $table->double('travel_budget_percentage');
            $table->integer('department_id')->unsigned();
            $table->foreign('department_id')
                ->references('id')
                ->on('departments')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('applicable_quarter');
            $table->double('total_travel_budget');
            $table->date('budget_balance_at');
            $table->double('travel_budget_balance');
            $table->integer('project_id')
                ->references('id')
                ->on('projects')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('regional_office_of_mission_destination');
            $table->string('communication_support_required');
            $table->integer('created_by')->unsigned();
            $table->foreign('created_by')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->boolean('approved')->default(0);
            $table->text('mission_report')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('travel_plans');
    }
}
