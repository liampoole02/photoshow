@extends('layouts.app')

@section('content')
<div class="container">
    @if(count($albums)>0)
    <div class="row">
        @foreach($albums as $album)
        <div class="col-md-4">
            <div class="card mb-4 box-shadow">
                <img class="card-img-top" alt="$album->cover_image" style="height: 225px; width: 100%; display: block;" src="/storage/album_covers/{{ $album->cover_image }}" data-holder-rendered="true">
                <div class="card-body">
                    <p class="card-text">{{ $album->description }} </p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a href="{{ route('album-show', $album->id) }}" class="btn btn-sm btn-outline-secondary">View</a>
                        </div>
                        <small class="text-muted">{{ $album->name }}</small>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <h3> No albums yet. </h3>
    @endif
</div>

@endsection