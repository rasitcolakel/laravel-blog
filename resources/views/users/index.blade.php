@extends('layouts.app')

@section('title', 'Users')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Posts</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <th scope="row">
                        <a href="{{ route('users.show', ['user' => $user->id]) }}">
                            {{$user["id"]}}
                        </a>
                    </th>
                    <td>{{$user["name"]}}</td>
                    <td>{{$user["email"]}}</td>
                    <td>{{ $user->posts()->count()}}</td>
                </tr>
            @endforeach

            </tbody>
        </table>
        {{ $users->render('custom.pagination') }}
        @if (session('toast'))
            <script>
                window.addEventListener('DOMContentLoaded', function () {
                    showToast('{{ session('success') }}', 'success');
                });
            </script>
        @endif
    </div>
@endsection
