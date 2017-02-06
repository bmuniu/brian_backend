<?php

namespace App\Http\Controllers;

use App\Department;
use App\Project;
use App\TravelPlan;
use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Yajra\Datatables\Facades\Datatables;

class TravelPlanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $projects = Project::all();
        $departments = Department::all();

        return view('travel-plans.create-travel-plan', [
            'projects' => $projects,
            'departments' => $departments
        ]);
    }

    public function getAllTravelPlans(){
        $plans = TravelPlan::query();
        return Datatables::of($plans)
            ->make(true);
    }
    
    public function loadMoreDetails(Request $request){
        $plan_id = $request->plan_id;
        $travel_plan = TravelPlan::find($plan_id);

        // get project name
        $project = Project::find($travel_plan->project_id);
        $travel_plan->project_id = $project->project_name;

        // get department name
        $department = Department::find($travel_plan->department_id);
        $travel_plan->department_id = $department->department_name;

        // get staff member who created the travel plan
        $staff = User::find($travel_plan->created_by);
        $travel_plan->created_by = $staff->name;

        return Response::json($travel_plan);
    }

    public function approve(Request $request){
        try {
            $travel_plan = TravelPlan::find($request->plan_id);
            $travel_plan->approved = 1;
            $travel_plan->save();
            
            return Response::json([
                'success' => true,
                'message' => 'Travel Plan has been successfully approved'
            ]);
        } catch (QueryException $qe) {
            return Response::json([
                'success' => false,
                'message' => $qe->getMessage()
            ]);
        }
    }

    public function reject(Request $request){
        try {
            $travel_plan = TravelPlan::find($request->plan_id);
            $travel_plan->status = 0;
            $travel_plan->save();

            return Response::json([
                'success' => true,
                'message' => 'Travel Plan has been rejected'
            ]);
        } catch (QueryException $qe) {
            return Response::json([
                'success' => false,
                'message' => $qe->getMessage()
            ]);
        }
    }
}
