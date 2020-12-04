@extends('layouts.app')
@section('content')
<h1 class="ml-5 mb-5 text-center text-warning">All Users : </h1>
<div class="row d-flex justify-center align-items-center m-0">
    @foreach ($userData as $user)
    <div class="col-4 mx-auto d-flex justify-content-center mb-3">
        <div class="card text-center" style="width: 18rem;">
           @if ($user->avatar_id == null)
           <img src="images/derpAang.jpg" class="card-img-top" alt="...">
           @else  
           <img src="{{'images/'.$user->avatar->src}}" class="card-img-top" alt="...">
           @endif
            <div class="card-body">
              <h5 class="card-title">Name : {{$user->name}} </h5>
              <h5 class="card-title">Age :  {{$user->age}} </h5>
              <a href="/show_users/{{$user->id}}" class="btn btn-info">See more</a>
            </div>
          </div>
    </div>
    @if ($loop->iteration % 3 == 0)
        </div>
        <div class="row">
    @endif
    @endforeach
</div>
@endsection