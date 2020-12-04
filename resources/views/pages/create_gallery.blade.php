@auth
    @extends('layouts.app')
    @section('content')
    <h1 class="mt-5 mb-5 text-center text-warning">Create an Image Gallery : </h1>
    @if ($errors->any())
    <div class="alert alert-warning w-25">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="d-flex justify-content-center mb-5">
    <form action="/store_gallery" method="post" class="bg-info p-5 w-50 rounded text-center">
        @csrf
        <label for="name" class="text-warning">Gallery's name :
            <input type="text" name="name" value="{{old('name')}}">
        </label>
        <button type="submit" class="bg-warning border border-none text-danger rounded">Create</button>
    </form>
</div>
        <div class="row d-flex justify-content-center w-100 m-0">
            @foreach ($galleryData as $gallery)
                <div class="col-4 d-flex flex-column align-items-center justify-content-center">
                    <div class="card text-white bg-info mb-3 border border-white w-100" style="max-width: 18rem;">
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