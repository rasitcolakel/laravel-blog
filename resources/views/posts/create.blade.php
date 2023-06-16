<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Posts</h1>
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
</body>
</html>
