@extends('layouts.app')

@section('title' , 'New Episod')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Add New Episod</div>

                <div class="card-body">
                    
                    <form action="{{ route('radio.store') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="topic">Topic</label>
                            <input type="text" name="topic" class="form-control" id="topic" value="{{ old('topic') }}">
                        </div>
                        <div class="form-group">
                            <label for="episod_no">Episod no</label>
                            <input type="number" name="episod_no" class="form-control" id="episod_no" value="{{ old('episod_no') }}">
                        </div>
                        <div class="form-group">
                            <label for="audio">Audio</label>
                            <input type="file" name="audio" class="form-control" id="audio">
                        </div>
                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
