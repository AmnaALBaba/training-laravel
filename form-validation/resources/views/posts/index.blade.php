<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <div class="container">
       <div>
         <h1>All Post ({{$posts->total()}})</h1>
         <a class="btn btn-success"href="{{route('posts.create')}}">Create new Post</a>

       </div>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Content</th>
                </tr>
            </thead>
            @forelse ($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td><img src="{{asset($post->image)}}" alt="" width="100"></td>
                <td>{{$post->content}}</td>
            </tr>

            @empty
            <tr>
                <td colspan="4">No data found</td>
            </tr>

            @endforelse
        </table>
        {{$posts->links()}}
    </div>


</body>
</html>
