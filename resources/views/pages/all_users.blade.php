@extends('template')
@section('content')
<div class="row">
    <h1>All Users : </h1>
    @foreach ($userData as $user)
    <div class="col-4">
        <div class="card" style="width: 18rem;">
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