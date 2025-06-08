@php
    use App\Models\Category;
    $categories = new Category();
    $categories = $categories->get();
@endphp

@extends('admin.components.layout')
@section('content')
    <div class="container my-5">
        <h1>Categories</h1>
        <form action="{{ url('/create_category') }}" method= "post">
            @csrf
            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" name ="name" id ="name" placeholder ="Enter your name" class ="form-control">

            </div>


            <button class = "btn btn-primary px-5">Create</button>


        </form>


        <table class ="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Created by</th>
                    <th>Created at</th>
                    <th>Delete</th>
                </tr>

            </thead>
            <tbody>
                @foreach ($categories as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->userData->name }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td><a href="{{ url('/del_category') }}/{{ $item->id }}" class = "btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
