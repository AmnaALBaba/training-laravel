<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>create New post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <h1>Create New Post</h1>
    <a href="{{ route('posts.index') }}">All Posts</a>

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
            @include('posts._form')
    </form>






</body>

</html>
