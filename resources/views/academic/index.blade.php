@extends('layout.app')

@section('content')

<div class="card">
    <div class="card-header">
        <h4>Academic Detail</h4>
        <a class="btn btn-success" href="{{route('academic.create')}}">Add New</a>
    </div>
    <div class="card-body">
        @if(\Session::has('success'))
        <div class="alert alert-success">
            <p>{{\Session::get('success')}}</p>
        </div>
        @endif
        <table class="table table-striped">
            <thead>
                <th>Year</th>
                <th>Detail</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach($academics as $a)
                <tr>
                    <td>({{$a['id']}}) - {{$a['year']}}</td>
                    <td>
                        @php ($data = unserialize($a['academic_detail']))
                        Term: {{$data['term']}}<br>
                        Start: {{$data['start_date']}} <br>
                        End: {{$data['end_date']}}
                    </td>
                    <td>
                        <a href="@">Edit</a> |
                        <a href=" {{action('AcademicController@destroy',$a['id'])}}">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<hr>
@endsection