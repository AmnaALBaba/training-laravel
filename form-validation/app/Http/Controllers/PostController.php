<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\postRequest;

class PostController extends Controller
{
    function index(){
    $posts = Post::latest('id')->paginate(10);


    return view('posts.index',compact('posts'));
}
function create(){
    return view('posts.create');
}

function store(postRequest $request){


$path = $request->file('image')->store('uploads','custom');
    Post::create(
        [
            'title'=>$request->title,
            'image'=>$path,
            'content'=>$request->content

        ]
        );
        return redirect()->route('posts.index');
}
}
