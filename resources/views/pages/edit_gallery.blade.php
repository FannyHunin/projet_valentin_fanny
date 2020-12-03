@auth
    @extends('layouts.app')
    @section('content')
        <h1>Edit a Gallery</h1>
    <form action="/update_gallery/{{$galleryData->id}}" method="post">
            @csrf
            <label for="name">Gallery's name :
                <input type="text" name="name" value="{{old('name')}}">
            </label>
            <button type="submit">Update</button>
        </form>
    @endsection
@endauth