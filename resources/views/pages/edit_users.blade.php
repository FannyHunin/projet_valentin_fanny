@extends('layouts.app')

@section('content')
<h1 class="mt-5 mb-5 text-center text-warning">Edit User : </h1>
<div class="container d-flex justify-content-center">
    <div class="row d-flex justify-content-center w-100 m-0 p-0">
        <div class="col-md-8 p-0 d-flex justify-content-center w-100">
            <div class="card " style="width: 18rem;">
                <div class="card-body bg-info">
                  <form action="/update_users/{{$userData->id}}" method="post">
                    @csrf
                    <label for="name">Name : 
                        <input name="name" type="text" value="{{$userData->name}}">
                    </label>
                    <label for="age">Age : 
                        <input name="age" type="number" value="{{$userData->age}}">
                    </label>
                    <label for="avatar_id">
                        @foreach ($avatarData as $avatar)
                            <input type="radio" name="avatar_id" id="" value="{{$avatar->id}}">
                            <img src="{{asset('images/'.$avatar->src)}}" width="50px" height="50px" alt="">
                        @endforeach
                    </label>            
                    <label for="email">E-mail
                        <input name="email" type="text" value="{{$userData->email}}">
                    </label>
                    <label for="password">Password : 
                        <input name="password" type="password" value="{{$userData->password}}">
                    </label>
                    <button type="submit" class="bg-warning border border-none text-danger rounded">Update</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
