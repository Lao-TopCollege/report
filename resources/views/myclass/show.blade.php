@extends('layout.app')
@section('content')
@php ($data = unserialize($selectedClass['myclass']))
@csrf
<div class="card">
    <div class="card-header">
        <h3>
            Year {{$data['year']}}

            @if (!empty($data['extend']))
            - {{$data['extend']}}
            @endif

        </h3>
        {{$data['course']}}-{{$data['session']}}
        <i>({{$data['subject']}})</i>
        <br>
        <a href="{{action('MyClassController@edit', $selectedClass['id'])}}">Edit</a>
    </div>
    <div class="card-body">
        <a class="btn btn-success" href="{{action('ReportController@create')}}">New Report</a>
    </div>
</div>
@endsection