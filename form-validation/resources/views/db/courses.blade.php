<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All courses</title>
    @vite('[resources/css/app.css]')
</head>

<body>
    <div class="max-w-7xl mx-auto mt-10">
        <h1 class="text=3xl font-bold mb-4">All Courses ({{$courses=>total()}})</h1>
        <table class="w-full mb-4">
            <thead>
                <tr>
                    <th class="text-start border p-2 bg-gray-100">ID</th>
                    <th class="text-start border p-2 bg-gray-100">Image</th>
                    <th class="text-start border p-2 bg-gray-100">title</th>
                    <th class="text-start border p-2 bg-gray-100">Price</th>
                    <th class="text-start border p-2 bg-gray-100">Category</th>
                    <th class="text-start border p-2 bg-gray-100">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                    <tr>
                        <td class="border p-2">{{ $course->id }}</td>
                        <td class="border p-2">{{ $course->image }}</td>
                        <td class="border p-2">{{ $course->title }}</td>
                        <td class="border p-2">{{ $course->price }}</td>
                        <td class="border p-2">{{ $course->category }}</td>
                        <td class="border p-2">Actions</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{$courses->links()}}

    </div>
</body>

</html>
