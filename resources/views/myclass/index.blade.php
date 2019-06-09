@extends('layout.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>My Classroom</h4>
        <i text-right><a href="/myclass/create" class="btn btn-primary btn-sm">Add</a></i>
    </div>
    <div class="card-body">
        <div class="row">
            @foreach ($myclass as $row)
            @php ($data = unserialize($row['myclass']))
            <div class="col-sm-4 box">
                <div class="in-box">
                    <a href="/myclass/{{$row['id']}}">
                        <h4>Year {{$data['year']}}
                            @if (!empty($data['extend']))
                            - {{$data['extend']}}
                            @endif
                        </h4>
                    </a>
                    {{$data['course']}} - {{$data['session']}} <i>({{$data['subject']}})</i>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>


@endsection