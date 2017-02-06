@extends('layouts.app')
@section('title', 'Create New Travel Plan')

@push('js')
<script src="{{ URL::asset('js/create-travel-plan.js') }}" xmlns="http://www.w3.org/1999/html"
        xmlns="http://www.w3.org/1999/html"></script>
@endpush

@section('content')
    {{--Travel Plan Form (User Inputs)--}}
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Create New Travel Plan - <small> Please fill in the fields below</small></div>
                    <div class="panel-body">
                        <form action="{{ url('/travel-plan/save') }}" method="post" class="form-horizontal" novalidate>
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Name</label>
                                <div class="col-md-3">
                                    <input id="name" type="text" class="form-control" name="name" placeholder="Name" required>

                                    <span class="help-block"></span>
                                </div>

                                <div class="col-md-3">
                                    <input id="name" type="text" class="form-control side" name="grade" placeholder="Grade" required>

                                    <span class="help-block"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="meeting" class="col-md-4 control-label">Meeting/Institution</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="" required>

                                    <span class="help-block"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="dates" class="col-md-4 control-label">Dates</label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control datepicker" id="start_date" name="start_date" data-toggle="tooltip" placeholder="Start Date" name="start_date" value="" required>

                                    <span class="help-block"></span>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control datepicker side" id="end_date" name="end_date" placeholder="End Date" value="" required>

                                    <span class="help-block"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="days_away" class="col-md-4 control-label">Days Away</label>
                                <div class="col-md-2">
                                    <input id="misson_days" type="number" class="form-control" min="1" data-toggle="tooltip" title="Enter Mission Days" placeholder="Mission Days" name="mission_days" required>

                                    <span class="help-block"></span>
                                </div>
                                <div class="col-md-2">
                                    <input id="travel_days" type="number" class="form-control side" min="1"
                                           name="travel_days" data-toggle="tooltip" title="Enter Travel Days" placeholder="Travel Days" required>

                                    <span class="help-block"></span>
                                </div>
                                <div class="col-md-2">
                                    <input id="leave_days" type="number" class="form-control side" min="1"
                                           name="leave_days" data-toggle="tooltip" title="Enter Leave Days" placeholder="Leave Days" required>

                                    <span class="help-block"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="justification" class="col-md-4 control-label">Justification</label>
                                <div class="col-md-6">
                                    <textarea name="justification" id="justification" class="form-control" required></textarea>

                                    <span class="help-block"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="project" class="col-md-4 control-label">Project</label>
                                <div class="col-md-6">
                                    <select name="project" id="project" class="form-control" required>
                                        <option value="">--Link Project--</option>
                                        @if(count($projects))
                                            @foreach($projects as $project)
                                                <option value="{{ $project->id }}">{{ $project->project_name }}</option>
                                            @endforeach
                                        @endif
                                    </select>

                                    <span class="help-block"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="budget-line" class="col-md-4 control-label">Budget Line</label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">$</span>
                                        <input type="number" min="1" step="any" name="budget_line" id="budget-line" class="form-control" required/>
                                    </div>

                                    <span class="help-block"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="est_travel_cost" class="col-md-4 control-label">Estimated Travel Cost</label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">$</span>
                                        <input type="number" min="1" step="any" name="est_travel_cost" id="est_travel_cost" class="form-control" required/>
                                    </div>

                                    <span class="help-block"></span>
                                </div>
                            </div>

                            <div class="form-group additional-costs-btn">
                                <label for="budget-line" class="col-md-4 control-label"><small> Click to add
                                    other persons attending same meeting and related expenses: </small></label>
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-sm btn-warning">
                                        <i class="glyphicon glyphicon-plus"></i> Additional Costs
                                    </button>
                                </div>
                            </div>

                            <div class="form-group additional-costs" style="display: none;">
                                <label for="additional-costs" class="col-md-4 control-label">Additional Costs</label>
                                <div class="col-md-3">
                                    <input type="text" name="person_name[]" data-toggle="tooltip" title="Person's Name"
                                           class="form-control"/>

                                    <span class="block"></span>
                                </div>

                                <div class="col-md-2">
                                    <div class="input-group side">
                                        <span class="input-group-addon">$</span>
                                            <input type="number" min="0" data-toggle="tooltip"
                                                   title="Related Travel Cost" step="any" name="travel_costs[]"
                                                   class="form-control"/>
                                        </span>
                                    </div>
                                    <span class="block"></span>
                                </div>

                                <div class="col-md-1">
                                    <button type="button"
                                            class="btn btn-warning" id="add_more"><i class="glyphicon glyphicon-plus"></i> </button>
                                </div>
                            </div>

                            <div class="form-group more-additional-costs hide">
                                <label for="additional-costs" class="col-md-4 control-label">Additional Costs</label>
                                <div class="col-md-3">
                                    <input type="text" name="person_name[]" data-toggle="tooltip" title="Persons Name"
                                           class="form-control"/>

                                    <span class="block"></span>
                                </div>

                                <div class="col-md-2">
                                    <div class="input-group side">
                                        <span class="input-group-addon">$</span>
                                        <input type="number" min="0" data-toggle="tooltip"
                                               title="Related Travel Cost" step="any" name="travel_costs[]"
                                               class="form-control"/>
                                        </span>
                                    </div>
                                    <span class="block"></span>
                                </div>

                                <div class="col-md-1">
                                    <button type="button"
                                            class="btn btn-success reduce_fields"><i class="glyphicon glyphicon-minus"></i> </button>
                                </div>
                            </div>

                            {{--clones--}}
                            <div id="clones"></div>

                            <div class="form-group">
                                <label for="project" class="col-md-4 control-label">Department</label>
                                <div class="col-md-6">
                                    <select name="project" id="project" class="form-control" required>
                                        <option value="">--Select Department--</option>
                                        @if(count($departments))
                                            @foreach($departments as $department)
                                                <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                                            @endforeach
                                        @endif
                                    </select>

                                    <span class="help-block"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="perc_travel_budget_for_yr" class="col-md-4 control-label">Percentage of travel budget for the year</label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">%</span>
                                        <input type="number" min="1" step="any" name="budget_line" id="perc_travel_budget_for_yr" class="form-control" required/>
                                    </div>

                                    <span class="help-block"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="applicable-quarter" class="col-md-4 control-label">Applicable Quarter</label>
                                <div class="col-md-6">
                                    <input type="text" name="applicable_quarter" id="applicable-quarter" class="form-control" required/>

                                    <span class="help-block"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="total-travel-budget-allocated-for-yr" class="col-md-4 control-label">Total Allocated Travel Budget for the year</label>
                                <div class="col-md-6">
                                    <input type="text" name="applicable_quarter" id="total-travel-budget-allocated-for-yr" class="form-control" required/>

                                    <span class="help-block"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="total-travel-budget-allocated-for-yr" class="col-md-4 control-label">
                                    Total budget balance as at:</label>
                                <div class="col-md-3">
                                    <input type="text" name="date" data-toggle="tooltip" title="Date" placeholder="Date"
                                           class="form-control datepicker" required/>
                                    <span class="help-block"></span>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">$</span>
                                        <input type="text" name="balance" data-toggle="tooltip" title="Balance" placeholder="Balance" class="form-control side" required/>
                                    </div>
                                    <span class="help-block"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="regional_office_of_mission_destination" class="col-md-4 control-label">Regional office of the mission destination</label>
                                <div class="col-md-6">
                                    <input type="text" name="regional_office_of_mission_destination" id="regional_office_of_mission_destination" class="form-control" required/>

                                    <span class="help-block"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="communications_support_required" class="col-md-4 control-label">Communications support required</label>
                                <div class="col-md-6">
                                    <input type="text" name="communications_support_required" id="communications_support_required" class="form-control" required/>

                                    <span class="help-block"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-camera-retro"></i> Save Travel Plan
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection