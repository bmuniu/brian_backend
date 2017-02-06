@extends('layouts.app')
@section('title', 'My Travel Plan')

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