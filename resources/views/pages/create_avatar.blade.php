@extends('layouts.app')

@section('content')
<h1 class="mt-5 mb-5 text-center text-warning">Create an Avatar : </h1>
<div class="container d-flex flex-column justify-content-center align-items-center">
    @if (session('status'))
        <div class="alert alert-danger">
            {{ session('status') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <form enctype="multipart/form-data" action="/store_avatar" method="post" class="bg-info text-white" style="display:flex; flex-direction: column; align-items:start; border: solid black 1px; border-radius:5px; width:max-content; padding:10px; margin-bottom:50px">
            @csrf
            <label for="name">Image Name :
                <input name="name" type="text" value="{{old('name')}}">
            </label>
            <label for="src">Image :
                <input name="src" type="file" value="{{old('src')}}">
            </label>
            <button type="submit" class="bg-warning border border-none text-danger rounded">Create</button>
        </form>
    
        <div class="row w-100">
            @foreach ($avatarData as $avatar)
                <div class="col-4">
                    <div class="card" style="width: 18rem; height: 20rem;">
                        <img src="{{asset('images/'.$avatar->src)}}" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">{{$avatar->name}}</h5>
                        </div>
                        <div>
                            <a class="btn btn-info" href="/edit_avatar/{{$avatar->id}}">Edit</a>
                            <a class="btn btn-danger" href="/delete_avatar/{{$avatar->id}}">Delete</a>
                        </div>
                    </div>
                </div>
                @if ($loop->iteration % 3 == 0)
                    </div>
                    <div class="row">
                @endif
            @endforeach
        </div>
</div>
@endsection 