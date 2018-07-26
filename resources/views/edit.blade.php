@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('radio.update' , $radio->id ) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label for="topic">Topic</label>
                            <input type="text" name="topic" class="form-control" id="topic" value="{{ $radio->topic }}">
                        </div>
                        <div class="form-group">
                            <label for="episod_no">Episod no</label>
                            <input type="number" name="episod_no" class="form-control" id="episod_no" value="{{ $radio->episod_no }}">
                        </div>
                        <div class="form-group">
                            <label for="audio">Audio</label>
                            <input type="file" name="audio" class="form-control" id="audio">
                        </div>
                        <div class="form-group">
                           <audio controls>
                             <source src="{{ $radio->audio_public }}" type="audio/mpeg">
                           </audio>
                        </div>
                        <div class="form-group">
                            <button type="submit">Update</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection