@extends('layouts.app')


@section('title' , 'Radio')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Radio Contents</div>
                <div class="card-body">
                    <a href="{{ route('radio.create') }}" class="btn btn-success mb-2">Add new</a>

                    <table class="table">
                        <tr>
                            <th width="10%">Episod #</th>
                            <th>Topic</th>
                            <th>Audio</th>
                            <th width="15%">action</th>
                        </tr>
                        @foreach($episods as $episod)
                        <tr>
                            <td>{{ $episod->episod_no }}</td>
                            <td>{{ $episod->topic }}</td>
                            <td>
                                <audio controls>
                                  <source src="{{ $episod->audio_public }}" type="audio/mpeg">
                                </audio>
                            </td>
                            <td>
                                
                                <a href="{{ route('radio.edit' , $episod->id) }}" class="btn btn-success">
                                    <i class="fa fa-pencil"></i>
                                </a>

                                <form action="{{ route('radio.destroy' , $episod->id) }}" method="post" style="display: inline">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
