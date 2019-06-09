@extends('layout.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h4>Add new classroom</h4>
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

        <form action="/myclass" method="post">
            @csrf
            <input type="hidden" value="{{$academic_id}}" name="academic_id" placeholder="academic" id="">
            <input type="hidden" value="{{auth()->user()->id}}" name="teacher_id" placeholder="teacher" id="">

            <div class="row">
                <div class="col-sm">
                    <div class="form-group">
                        <label for="extend">
                            Course
                        </label>
                        <select class="form-control" name="course" id="extend">
                            <option class="form" value="">Select Course</option>
                            @foreach ($course as $c)
                            <option value="{{$c}}">{{$c}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="form-group">
                        <label for="session">
                            Session
                        </label>
                        <select class="form-control" name="session" id="session">
                            <option value="">Select Session</option>
                            @foreach ($session as $s)
                            <option value="{{$s}}">{{$s}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div><!-- row -->
            <div class="row">
                <div class="col-sm">
                    <div class="form-group">
                        <label for="year">
                            Year
                        </label>
                        <select class="form-control" name="year" id="year">
                            <option value="">Select Year</option>
                            @foreach ($year as $y)
                            <option value="{{$y}}">{{$y}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="form-group">
                        <label for="extend">
                            Extends
                        </label>
                        <select class="form-control" name="extend" id="extend">
                            <option class="form" value="">Select Extends</option>

                            @foreach ($extend as $e)
                            <option value="{{$e}}">{{$e}}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
            </div><!-- row -->
            <div class="form-group">
                <label for="subject">
                    Subject
                </label>
                <input class="form-control" placeholder="Ente your subject" type="text" name="subject" id="subjce">
            </div>
            <div class="text-center">
                <div class="col-sm">
                    <input type="submit" value="Add" class="btn btn-success btn-lg">
                </div>
            </div>
        </form>
    </div>
</div>
@endsection