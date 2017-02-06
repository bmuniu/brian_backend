<?php

use Illuminate\Database\Seeder;
use App\TravelPlan;
use App\AdditionalCost;

class TravelPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $department = \App\Department::find(1);
        $project = \App\Project::find(1);
        $brian = \App\User::where('email', 'bryanmunio@yahoo.com')->first();

        $start_date = date('Y-m-d');
        $end_date = date('Y-m-d', strtotime("+1 month", strtotime($start_date)));
        $tp = new TravelPlan();
        $tp->name = 'Test Travel Plan';
        $tp->grade = 'Test Grade';
        $tp->institution = 'Test Institution';
        $tp->venue = 'KICC';
        $tp->start_date = $start_date;
        $tp->end_date = $end_date;
        $tp->days_away = 30;
        $tp->justification = 'Justification text';
        $tp->budget_line = 100000;
        $tp->travel_budget_percentage = 0.25;
        $tp->department_id = $department->id;
        $tp->applicable_quarter = 'Test Quarter';
        $tp->total_travel_budget = 25000;
        $tp->budget_balance_at = date('Y-m-d');
        $tp->travel_budget_balance = 2000;
        $tp->project_id = $project->id;
        $tp->regional_office_of_mission_destination = 'Test Mission Destination';
        $tp->communication_support_required = 'Non';
        $tp->created_by = $brian->id;
        $tp->save();

        // create test additional costs
        $add_cost = new AdditionalCost();
        $add_cost->travel_plan_id = $tp->id;
        $add_cost->person_name = 'Brian Munio';
        $add_cost->travel_cost = 25000;
        $add_cost->save();

        $add_cost = new AdditionalCost();
        $add_cost->travel_plan_id = $tp->id;
        $add_cost->person_name = 'Mary Wanjiru';
        $add_cost->travel_cost = 25000;
        $add_cost->save();
    }
}
