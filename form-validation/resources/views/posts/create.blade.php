<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create New Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <div class="container">
        <div>
            <h1>Create New Post</h1>
            <a class="btn btn-success"href="{{ route('posts.index') }}">Create new Post</a>
        </div>
        <form action="{{route('posts.store')}}" method="POST">
            @csrf
            <x-form.input name="title" label="Title" type="text" hint="Enter your name" />
            <x-form.input name="image" label="Image" type="file" />
            <x-form.input name="content" label="Content" type="text" hint="Enter your Content" />
            <button class="btn btn-success">Create</button>


        </form>



    </div>

    </div>


</body>

</html>
