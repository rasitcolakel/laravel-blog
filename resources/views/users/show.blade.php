@extends('layouts.app')

@section('title', 'Users')

@section('content')
    <!-- Generate a user profile page with bootstrap -->
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <h1>{{ $user->name }}</h1>
                <p>Email: {{ $user->email }}</p>
                <p>Posts: {{ $user->posts()->count() }}</p>
            </div>
            <div class="col-12 col-md-6">
                <h3>Posts ({{ $posts->total() }})</h3>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Created at</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>
                                <a href="{{ route('posts.show', ['post' => $post->id]) }}">
                                    {{$post["title"]}}
                                </a>
                            </td>
                            <td>{{$post["created_at"]}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $posts->render('custom.pagination') }}
            </div>
    </div>
@endsection
