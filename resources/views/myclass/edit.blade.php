@extends('layout.app')
@section('content')
@php ($data = unserialize($selectedClass['myclass']))
<div class="card">
    <div class="card-header">
        <h4>Edit Class</h4>
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
        <form action="{{action('MyClassController@update',$id)}}" method="post">
            @csrf
            <input type="hidden" value="{{$selectedClass['academic_id']}}" name="academic_id" placeholder="academic" id="">
            <input type="hidden" value="{{$selectedClass['teacher_id']}}" name="teacher_id" placeholder="teacher" id="">
            <input type="hidden" name="_method" id="" value="PATCH">
            <div class="row">
                <div class="col-sm">
                    <div class="form-group">
                        <label for="extend">
                            Course
                        </label>
                        <select class="form-control" name="course" id="course">
                            <option class="form" value="">Select Course</option>
                            @foreach ($course as $c)
                            <option @if($c==$data['course']) selected @endif value="{{$c}}">{{$c}}</option>
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
                            <option @if($s==$data['session']) selected @endif value="{{$s}}">{{$s}}</option>
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
                            <option @if($y==$data['year']) selected @endif value="{{$y}}">{{$y}}</option>
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
                            <option class="form" value="">No Sub</option>

                            @foreach ($extend as $e)
                            <option @if($e==$data['extend']) selected @endif value="{{$e}}">{{$e}}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
            </div><!-- row -->
            <div class="form-group">
                <label for="subject">
                    Subject
                </label>
                <input value="{{$data['subject']}}" class="form-control" placeholder="Ente your subject" type="text" name="subject" id="subject">
            </div>
            <div class="text-center">
                <div class="col-sm">
                    <input type="submit" value="Save" class="btn btn-success btn-lg">
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

<script>
    function getSelected(sel, val) {
        var opt;
        for (var i = 0; i < sel.options.length; i++) {
            opt = sel.options[i];
            if (option.selected) {
                break;
            }
            return 'selected'
        }
    }
</script>