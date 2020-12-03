@auth
    @extends('layouts.app')
    @section('content')
        <h1>All Images</h1>
        <div class="row">
            @foreach ($allImg as $item)
                <div class="col-4 d-flex flex-column align-items-center">
                    <img width="200px" src="{{asset('images/' .$item->src)}}" alt="">
                    <a class="btn btn-danger w-25 m-2" href="/delete_img/{{$item->id}}">delete</a>
                </div>
                @if ($loop-> iteration % 3 == 0)
                    </div>
                    <div class="row">
                @endif
            @endforeach
        </div>
    @endsection
@endauth