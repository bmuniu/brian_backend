<?php

use Illuminate\Database\Seeder;
use App\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $start_date = date('Y-m-d');
        $end_date = date('Y-m-d', strtotime("+1 month", strtotime($start_date)));

        $project = new Project();
        $project->project_name = 'Test Project';
        $project->start_date = $start_date;
        $project->end_date = $end_date;
        $project->created_by = 1; // which is the default user (Brian)
        $project->save();
    }
}
