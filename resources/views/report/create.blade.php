@extends('layout.app')
@section('content')
@php($data = unserialize($selectedClass['myclass']))
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
    </div>
    <div class="card-body">
        @if(count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if(\Session::has('success'))
        <div class="alert alert-success">
            <p>{{\Session::get('success')}}</p>
        </div>
        @endif
        <form action="/report" method="post">
            @csrf
            <input type="text" name="class_id" value="{{Session::get('id')}}">
            <input type=" text" name="teacher_id" placeholder="Teacher">
            <input type="text" name="academic_id" placeholder="Academic">

            <div class="form-group">
                <label for="anouncement">Anouncement</label>
                <input type="text" name="announcement" id="anouncement" class="form-control" placeholder="Announcement">
            </div>
            <div class="row">
                <div class="col form-group">
                    <label for="attend">Attend</label>
                    <input type="number" name="attend" id="attend" class="form-control" placeholder="Attend">
                </div>
                <div class="col form-group">
                    <label for="absent">Absent</label>
                    <input type="number" name="absent" id="absent" class="form-control" placeholder="Absent">
                </div>
            </div>
            <div class="row">
                <div class="col form-group">
                    <label for="late">Late</label>
                    <input type="number" name="late" id="late" class="form-control" placeholder="Late">
                </div>
                <div class="col form-group">
                    <label for="leave">Leave</label>
                    <input type="number" name="leave" id="leave" class="form-control" placeholder="Leave">
                </div>
            </div>
            <div class="form-group">
                <label for="lesson">Lesson</label>
                <textarea name="lesson" id="lesson" cols="30" rows="3" class="form-control" placeholder="Lesson"></textarea>
            </div>
            <div class="form-group">
                <label for="remark">Remark</label>
                <input type="text" name="remark" id="Remark" class="form-control" placeholder="Remark">
            </div>
            <div class="text-center">
                <input type="submit" value="Save Report" class="btn btn-primary">
            </div>
        </form>
    </div><!-- card-body -->
</div><!-- card -->

@endsection