@extends('layout')

@section('title', 'Create Post')

@section('content')
    <form method="post" action="{{route("posts.store")}}">
        @csrf
        @method("post")

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div>{{$error}}</div>
            @endforeach
        @endif

        <label>
            <input type="text" name="title" placeholder="Title" />
        </label>
        <label>
            <input type="text" name="description" placeholder="description" />
        </label>

        <input type="submit" value="Create" />
    </form>
@endsection
