@auth
    @extends('layouts.app')

    @section('content')
        <h1>{{$galleryData->name}} gallery</h1>
        <div>
            <a href="/edit_gallery/{{$galleryData->id}}" class="btn btn-info">Edit</a>
            <a href="/delete_gallery/{{$galleryData->id}}" class="btn btn-danger">Delete</a>
        </div>
        <div class="row border border-muted rounded">

        </div>
    @endsection
@endauth
