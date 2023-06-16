@extends('layout')

@section('title', 'Posts')

@section('content')
    <h1>Posts</h1>
    <div>
        <table border="1">
            <tr>
                <th>Title</th>
                <th>Description</th>
            </tr>
            @foreach($posts as $post)
                <tr>
                    <td>{{$post["title"]}}</td>
                    <td>{{$post["description"]}}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
