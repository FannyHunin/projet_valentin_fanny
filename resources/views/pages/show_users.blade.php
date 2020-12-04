@extends('layouts.app')

@section('content')
<h1 class="mt-5 mb-5 text-center text-warning">Show User : </h1>
<div class="d-flex justify-content-center">
  <div class="card m-0" style="width: 18rem;">
    @if ($userData->avatar_id == null)
      <img src="{{asset('images/derpAang.jpg')}}" class="card-img-top" alt="...">
    @else  
      <img src="{{asset('images/'.$userData->avatar->src)}}" class="card-img-top" alt="...">
    @endif
      <div class="card-body">
        <h5 class="card-title">{{$userData->name}}</h5>
        @if ($userData->avatar_id == null)
        No Avatar selected
        @else  
        <h5 class="card-title">{{$userData->avatar->name}}</h5>
        @endif
        <h5 class="card-title">{{$userData->age}}</h5>
        <h5 class="card-title">{{$userData->email}}</h5>
        <div>
          <div>
              <a class="btn btn-info" href="/edit_users/{{$userData->id}}">Edit</a>
              <a class="btn btn-danger" href="/delete_users/{{$userData->id}}">Delete</a>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection