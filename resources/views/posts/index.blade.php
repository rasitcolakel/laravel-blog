@extends('layout')

@section('title', 'Posts')

@section('content')
    <div class="flex justify-center items-center p-4 flex-col">
        <table class="w-9/12 text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Title
                </th>
                <th scope="col" class="px-6 py-3">
                    Description
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$post["title"]}}
                    </th>
                    <td class="px-6 py-4">
                        {{$post["description"]}}
                    </td>
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
