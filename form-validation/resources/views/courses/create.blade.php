<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add new Create</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- @vite('[resources/css/app.css]') --}}
</head>

<body>
    <div class="container">
        <div class="flex">
            <h1>Add New Courses</h1>
            <a class="btn btn-success"href="{{ route('course.index') }}"> All Courses</a>
        </div>

        <form action="{{ route('course.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid md:grid-cols-2 gab-4">
                <div>
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" placeholder="Enter a title"
                        class="p-2 border-gray-400 rounded w-full @error('title')
                        border-red-500

                        @enderror"value="{{old('title')}}">
                    @error('title')
                        <small class="text-red-500">
                            {{ $message }}

                        </small>
                    @enderror
                </div>
                <div>
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image" class="p-2 border-gray-400 rounded w-full @error('image')
                        border-red-500

                        @enderror"">
                    @error('image')
                        <small class="text-red-500">
                            {{ $message }}

                        </small>
                    @enderror
                </div>

                <div>
                    <label for="category">Category</label>
                    <input type="text" name="category" id="category" placeholder="Enter a category"
                        class="p-2 border-gray-400 rounded w-full @error('category')
                        border-red-500

                        @enderror"value="{{old('category')}} ">
                    @error('category')
                        <small class="text-red-500">
                            {{ $message }}

                        </small>
                    @enderror
                </div>
                <div>
                    <label for="price">Price</label>
                    <input type="text" name="price" id="price" placeholder="Enter a price"
                        class="p-2 border-gray-400 rounded w-full @error('price')
                        border-red-500

                        @enderror" value="{{old('price')}}">
                    @error('price')
                        <small class="text-red-500">
                            {{ $message }}

                        </small>
                    @enderror
                </div>
                <div col-span="2">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" placeholder="Enter a description" class="p-2 border-gray-400 rounded w-full @error('description')
                        border-red-500

                        @enderror"" value="{{old('description')}}" rows="5"></textarea>
                    @error('description')
                        <small class="text-red-500">
                            {{ $message }}

                        </small>
                    @enderror
                </div>
                <div>
                <button class="bg-green-500 text-white p-2 px-10 font-semibold duration-200 hover:bg-green-600 rounded">Save</button>

                </div>
            </div>
        </form>



    </div>
</body>

</html>
