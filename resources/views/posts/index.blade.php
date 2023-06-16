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
</body>
</html>
