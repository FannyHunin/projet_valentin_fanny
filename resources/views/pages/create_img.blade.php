@auth
    @extends('layouts.app')
    @section('content')
       <form enctype="multipart/form-data" action="/store_img" method="post">
           @csrf
           <label for="src">Your image : 
            <input name="src" type="file">
        </label>
        <label for="gallery_id">Choose a gallery: 
            <select name="gallery_id" id="">
                @foreach ($galleryData as $gallery)
                <option value="{{$gallery->id}}">{{$gallery->name}}</option>
                @endforeach
            </select>
        </label>
        <button type="submit">Add an image</button>
       </form>
    @endsection
@endauth