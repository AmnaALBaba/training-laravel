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
    <h1>All Posts({{ $posts->total() }})</h1>
    <a href="{{ route('posts.create') }}">Create New Post</a>
    <a href="{{ route('posts.trashed') }}">trashed Post</a>
    <form action="{{route('posts.index')}}" method="get">
        <input type="text" name="search" placeholder="search" value="{{request()->search}}">
        <select  name="order">
            <option @selected(request()->order =='ASC')  value="ASC">ASC</option>
            <option @selected(request()->order =='DESC') value="DESC">DESC</option>
        </select>
        <select name="count">
            <option @selected(request()->count ==2) value="2">2</option>
            <option  @selected(request()->count ==20) value="20">20</option>
            <option @selected(request()->count ==30)  value="30">30</option>
            <option  @selected(request()->count ==$posts->total()) value="{{$posts->total()}}">All</option>
        </select>
        <button>Filter</button>

    </form>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Image</th>
                <th>Content</th>
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
                    <td>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-success" onclick="return confirm('Are yor sure')">Delete</button>
                        </form>

                        <a href="{{route('posts.edit',[$post->id,'page'=>request()->page])}}">Edit</a>

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
