@php
    use App\Models\Post;
    $posts = new Post();
    $posts = $posts->where('category', $id)->get();
@endphp


@extends('blog.components.layout')
@section('content')
    <div class="container mt-4">
        <div class="row">
            <h1>{{ $name }}</h1>
            @foreach ($posts as $item)
                <div class ="col-lg-4 col-12 mb-3">
                    <a href="{{ url('/post') }}/{{ $item->id }}">
                        <img src="{{ asset('images') }}/{{ $item->image }}" alt="" class ="w-100">
                        <h3>{{ $item->title }}</h3>
                    </a>


                </div>
            @endforeach
        </div>
    </div>
@endsection
