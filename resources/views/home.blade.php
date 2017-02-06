@extends('layouts.app')
@section('title', 'Home')

@push('css')
    <style>
        .loading {
            opacity: 0.3;
            mouse-events: none;
        }
    </style>
@endpush

@push('js')
    <script src="{{ URL::asset('js/my-travel-plans.js') }}"></script>
@endpush

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-7 ">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <b>All Travel Plans</b>
                    <span class="pull-right">
                        <button class="btn btn-sm btn-info load-more-details">Load More details...</button>
                        <button class="btn btn-sm btn-success approve-plan">Approve</button>
                        <button class="btn btn-sm btn-danger reject-plan">Reject</button>
                    </span>
                </div>

                <div class="panel-body content">
                    <div id="feedback"></div>
                    <table id="all-travel-plans" class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Grade</th>
                                <th>Meeting/Institution</th>
                                <th>Venue</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="panel panel-default" id="more-details">
                <div class="panel-heading" id="plan_name"><b>Plan Details</b></div>

                <div class="panel-body content" id="plan-details">
                    <div class="alert alert-info no-plan">
                        <button class="close">&times;</button>
                        <strong>No Selection</strong> No Travel plan selected
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="update-status-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Update Status</h4>
            </div>
            <form action="" method="post" id="update-status-form" class="form-horizontal">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label  class="col-sm-2 control-label"
                                for="inputEmail3">Status</label>
                        <div class="col-sm-10">
                            <select name="status" class="form-control">
                                <option value="">--Status--</option>
                                <option value="Cleared by director">Cleared by director</option>
                                <option value="Request to Travel">Request to travel</option>
                                <option value="Cleared by relevant Officer">Cleared by relevant Officer</option>
                                <option value="Ready to travel">Ready to travel</option>
                                <option value="Claims request submitted">Claims request submitted</option>
                                <option value="Travel Assistant and mission report uploaded by staff">Travel Assistant and mission report uploaded by staff</option>
                            </select>
                        </div>
                    </div>
                </div>

                <input type="hidden" name="plan_id" id="modal-plan-id"/>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection