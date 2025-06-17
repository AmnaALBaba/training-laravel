<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All courses</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- @vite('[resources/css/app.css]') --}}
</head>

<body>
    <div class="container" >
        <div class="flex items-center justify-between mb-3">
            <h1 >All Courses ({{$courses->total()}})</h1>
            <a class="btn btn-success"href="{{route('course.create')}}"> create New Course</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>title</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($courses as $course)
                 <tr>
                        <td>{{ $course->id }}</td>
                        <td><img src="{{asset($course->image)}}" alt="" width="100"></td>
                        <td>{{ $course->title }}</td>
                        <td>{{ $course->price }}</td>
                        <td>{{ $course->category }}</td>
                        <td>
                           <form action="{{route('course.destroy',$course->id)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button>Delete</button>
                           </form>
                        </td>
                    </tr>

                @empty
                <tr>
                    <td class="text-center"colspan="6">No Data Found</td>
                </tr>

                @endforelse
            </tbody>
        </table>

        {{$courses->links()}}

    </div>
</body>

</html>
