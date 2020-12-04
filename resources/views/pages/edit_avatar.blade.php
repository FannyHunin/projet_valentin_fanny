@extends('layouts.app')

@section('content')
<h1 class="mt-5 mb-5 text-center text-warning">Edit an Avatar : </h1>
    <div class="d-flex justify-content-center">
        <form enctype="multipart/form-data" action="/update_avatar/{{$newAvatar->id}}" method="post" class="bg-info text-white" style="display:flex; flex-direction: column; align-items:start; border: solid black 1px; border-radius:5px; width:max-content; padding:10px; margin-bottom:50px">
            @csrf
            <label for="name">Image Name :
                <input name="name" type="text" value="{{$newAvatar->name}}">
            </label>
            <label for="src">Image :
                <input name="src" type="file" value="{{$newAvatar->src}}">
            </label>
            <button type="submit" class="bg-warning border border-none text-danger rounded">Update</button>
        </form>
    </div>
@endsection

