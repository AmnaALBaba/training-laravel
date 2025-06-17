@php
    use App\Models\Category;
    $categories = new Category();
    $categories = $categories->get();

    use App\Models\Post;
    $posts = new Post();
    $posts = $posts->get();

@endphp


@extends('admin.components.layout')
@section('content')
    <div class="container mt-4">
        <h3>posts</h3>
        <form action="{{ url('/create_post') }}" method="post" enctype ="multipart/form-data">
            @csrf
            {{-- @method('post') --}}

            <div class = "mb-3">
                <label for="">Image</label>
                <input type="file" class = "form-control" name ="image">
            </div>

            <div class = "mb-3">
                <label for="">Title</label>
                <input type="text" class = "form-control" name ="title">
            </div>

            <div class = "mb-3">
                <label for="">Category</label>
                <select name="category" id="" class ="form-control">
                    <option value="">select</option>

                    @foreach ($categories as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach

                </select>
            </div>

            <div class = "mb-3">
                <label for="">Content</label>
                <textarea name="content" class = "form-control" cols="30" rows="10"></textarea>
            </div>

            <button class ="btn btn-primary">Create</button>
        </form>

        <table class= "table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>title</th>
                    {{-- <th>Content</th> --}}
                    <th>Category</th>
                    <th>Created_by</th>
                    <th>Created_at</th>
                </tr>

            </thead>
            <tbody>
                @foreach ($posts as $item)
                    <tr>

                        {{-- @dd('images'.'/'.$item->image) --}}
                        <td>
                            <img src="{{ asset('images') }}/{{ $item->image }}" alt=""
                                style="width : 80px ; height : 80px ; object-fit:covet ;">
                        </td>
                        <td>{{ $item->title }}</td>P
                        {{-- <td>{{$item->content}}</td> --}}
                        <td>{{ $item->categoryData->name }}</td>
                        <td>{{ $item->userData->name }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td><a href="{{ url('/del_post') }}/{{ $item->id }}" class = "btn btn-danger">Delete</a>
                        </td>



                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>
@endsection
