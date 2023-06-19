@extends('layouts.app')

@section('title', 'Posts')

@section('content')
    @php
        $order_by = request()->get('order_by');
        $order_direction = request()->get('order_direction');
        $fields = ['id' => 'ID', 'title' => 'Title', 'created_at' => 'Created At', 'user_id' => 'Author'];
    @endphp
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="display-6">Users</h2>
            <a class="btn btn-primary" href="{{ route('posts.create') }}">Create Post</a>
        </div>
        <table class="table">
            <thead>
            <tr>
                @foreach($fields as $field => $label)
                    <th scope="col">
                        <a href="{{ route('posts.index', ['order_by' => $field, 'order_direction' => $order_direction == 'asc' ? 'desc' : 'asc']) }}" class="d-flex justify-content-between align-items-center">
                            <span>{{ $label }}</span>
                            @if ($order_by == $field && $order_direction == 'asc')
                                <i class="fas fa-arrow-up"></i>
                            @else
                                <i class="fas fa-arrow-down"></i>
                            @endif
                        </a>
                    </th>
                @endforeach

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
