@auth
    @extends('layouts.app')

    @section('content')
        <h1>{{$galleryData->name}} gallery</h1>
        <div>
            <a href="/edit_gallery/{{$galleryData->id}}" class="btn btn-info">Edit</a>
            <a href="/delete_gallery/{{$galleryData->id}}" class="btn btn-danger">Delete</a>
        </div>
        <div class="row border border-muted rounded">
            @foreach ($imgData as $img)
                @if ($img->gallery_id == $galleryData->id)
                <div class="col-4 d-flex flex-column align-items-center">
                    <img src="{{asset('images/' .$img->src)}}" alt="">
                    <a class="btn btn-danger w-25 m-2" href="/delete_img/{{$img->id}}">delete</a>
                </div>
                @endif
            @endforeach
        </div>
    @endsection
@endauth
