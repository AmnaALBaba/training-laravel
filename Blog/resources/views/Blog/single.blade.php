@php
    use App\Models\Post;
    $posts = new Post();
    $posts = $posts->find($id);
@endphp


@extends('blog.components.layout')
@section('content')

<div class="container mt-4">
    <div class="row">
        @if($posts)
        <h2>{{$posts->title}}</h2>
         <img src="{{asset('images')}}/{{$posts->image}}" alt="" class = "w-25" >
         <p>{{$posts->userData->name}}/{{$posts->created_at}}</p>
         <p>{{$posts->content}}</p>


        @endif



    </div>
</div>

@endsection
