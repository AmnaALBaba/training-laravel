<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <h1>Trahed Posts({{ $posts->total() }})</h1>
    <a href="{{ route('posts.index') }}">All Post</a>


    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Image</th>
                <th>Content</th>
                <th>deleted_at</th>
                <th>Action</th>
            </tr>

        </thead>
        <tbody>
            @forelse ($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td><img src="{{ asset($post->image) }}" alt="" width="100"></td>
                    <td>{{ $post->content }}</td>
                    <td>{{ $post->deleted_at->diffForHumans() }}</td>
                    <td>
                        <form action="{{ route('posts.forcedelete', $post->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-success" onclick="return confirm('Are yor sure')">Delete</button>
                        </form>

                        <a href="{{route('posts.restore',[$post->id])}}">restore</a>

                    </td>

                </tr>

            @empty
                <tr>
                    <td colspan="4">No Data Found</td>
                </tr>
            @endforelse

        </tbody>
    </table>
    {{ $posts->withQueryString()->links() }}
    {{-- {{ $posts->appends($_GET)->links() }} --}}



</body>

</html>
