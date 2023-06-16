@extends('layout')

@section('title', 'Create Post')

@section('content')
    <div class="container mx-auto p-4">
        <div class="mx-auto py-8 dark:bg-gray-800 rounded-lg w-4/6">
            <form method="post" action="{{route("posts.store")}}" class="p-2">
                @csrf
                @method("post")

                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div>{{$error}}</div>
                    @endforeach
                @endif

                <div class="mb-4">
                    <label for="title" class="block mb-2 dark:text-white">Title</label>
                    <input type="text" name="title" id="title" placeholder="Title"
                           class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:text-white"/>
                </div>

                <div class="mb-4">
                    <label for="description" class="block mb-2 dark:text-white">Description</label>
                    <input type="text" name="description" id="description" placeholder="Description"
                           class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:text-white"/>
                </div>

                <input type="submit" value="Create"
                       class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 cursor-pointer dark:bg-blue-800"/>
            </form>
        </div>
    </div>

@endsection
