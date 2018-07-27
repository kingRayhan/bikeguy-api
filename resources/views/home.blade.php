@extends('layouts.app')

@section('header')
    <style>
        .api-card {
            background: #FFF;
            padding: 15px;
            box-shadow: 0 0px 3px rgba(0,0,0,.25);
        }
    </style>
@stop


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="api-card">
                <h3>Radio</h3>
                <a href="{{ route('episods.index') }}" target="_blank">{{ route('episods.index') }}</a>
                <br>
                <a href="{{ route('radio.index') }}" class="btn btn-success w-100 mt-2">Manage</a>
            </div>
        </div>
    </div>
</div>
@endsection
