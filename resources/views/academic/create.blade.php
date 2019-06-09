@extends('layout.app')

@section('content')

<div class="card">
    <div class="card-header">
        <h4>Add New Academic</h4>
        <a class="btn btn-success" href="{{route('academic.index')}}">Back</a>
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
        <form action="/academic" method="post">
            @csrf
            <div class="form-group">
                <label for="">Year</label>
                <input type="text" name="year" id="year" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Term</label>
                <select name="term" id="" class="form-control">
                    <option value="">Select Term</option>
                    <option value="1">Term 1</option>
                    <option value="2">Term 2</option>
                    <option value="3">Term 3</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Start Date</label>
                <input type="date" name="start_date" id="start_date" class="form-control">
            </div>
            <div class="form-group">
                <label for="">End Date</label>
                <input type="date" name="end_date" id="end_date" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Save">
            </div>
        </form>
    </div>
</div>
<hr>
@endsection