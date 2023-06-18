@extends('layouts.app')

@section('title', 'Posts')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <h1>{{ $post["title"] }}</h1>
                <p>{{ $post["description"] }}</p>
                <div class="d-flex flex-row">
                    <p class="p-1">Created by:</p>
                    <a class="p-1" href="{{ route('users.show', ['user' => $post->user->id]) }}">
                        {{ $post->user->name }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
