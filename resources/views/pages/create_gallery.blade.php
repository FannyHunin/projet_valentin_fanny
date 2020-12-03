@auth
    @extends('layouts.app')
    @section('content')
        <h1>Create a new Gallery</h1>
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <form action="/store_gallery" method="post">
            @csrf
            <label for="name">Gallery's name :
                <input type="text" name="name" value="{{old('name')}}">
            </label>
            <button type="submit">Create</button>
        </form>
        <div class="row">
            @foreach ($galleryData as $gallery)
                <div class="col-4">
                    <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                        <div class="card-header">{{$gallery->name}}</div>
                        <a href="/show_gallery/{{$gallery->id}}" class="btn btn-light w-50">See more</a>
                      </div>
                </div>
                @if ($loop->iteration % 3 == 0)
                    </div>
                    <div class="row">
                @endif
            @endforeach
        </div>
    @endsection
@endauth