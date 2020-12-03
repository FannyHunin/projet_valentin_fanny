@extends('template')

@section('content')
<h1>Edit Avatar : </h1>
<form enctype="multipart/form-data" action="/update_avatar/{{$newAvatar->id}}" method="post">
        @csrf
        <label for="name">Image Name :
            <input name="name" type="text" value="{{$newAvatar->name}}">
        </label>
        <label for="src">Image :
            <input name="src" type="file" value="{{$newAvatar->src}}">
        </label>
        <button type="submit">Update</button>
    </form>
@endsection

