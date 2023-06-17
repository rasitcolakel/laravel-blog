@extends('layouts.app')

@section('title', 'Create Post')

@section('content')
    <div class="container mx-auto p-4">
        <div class="mx-auto py-8 bg-light rounded-lg w-4/6">
            <form method="post" action="{{ route('posts.store') }}" class="p-2">
                @csrf
                @method('post')

                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                @endif

                <div class="mb-4">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" id="title" placeholder="Title" class="form-control">
                </div>

                <div class="mb-4">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" name="description" id="description" placeholder="Description" class="form-control">
                </div>

                <input type="submit" value="Create" class="btn btn-primary">
            </form>
        </div>
    </div>


@endsection
