@extends('layouts.app')

@section('title', 'Posts')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Created By</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <th scope="row"><a href="{{ route('posts.show', ['post' => $post->id]) }}">{{$post["id"]}}</a></th>
                    <td>{{$post["title"]}}</td>
                    <td>{{$post["description"]}}</td>
                    <td>{{$post["user"]["name"]}}</td>
                </tr>
            @endforeach

            </tbody>
        </table>
        {{ $posts->render('custom.pagination') }}
        @if (session('toast'))
            <script>
                window.addEventListener('DOMContentLoaded', function () {
                    showToast('{{ session('success') }}', 'success');
                });
            </script>
        @endif
    </div>
@endsection
