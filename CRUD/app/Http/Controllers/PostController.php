<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Contracts\Database\Eloquent\Builder;

class PostController extends Controller
{
    function index(Request $request){
        $posts = Post::orderBy('id',$request->order??'DESC')->when($request->search,function(Builder $query)use($request){
            $query->where('title','like','%'.$request->search.'%');
        })->paginate($request->count??2);
        return view('posts.index',compact('posts'));
    }

// http://127.0.0.1:8000/posts?search=a&order=ASC&count=2
// http://127.0.0.1:8000/posts?page=2

    function create(){
        //empty object
        $post = new Post();
    return view('posts.create',compact('post'));


    }
    function store(PostRequest $request){

        $path = $request->file('image')->store('uploads' , 'custom');
        Post::create([
            'title'=>$request->title,
            'image'=>$path,
            'content'=>$request->content
        ]);
        return redirect()->route('posts.index');

    }
    function edit($id){
        $post = Post::findOrFail($id);
        return view('posts.edit' , compact('post'));
    }
    function update(PostRequest $request , $id){
        $post = Post::findOrFail($id);
        if($request->hasFile('image')){//if add a new image 1-remove existing image 2-upload new image
            File::delete(public_path($post->image));
            $path = $request->file('image')->store('uploads' ,'custom');

        }
        $post->update([
            'title'=>$request->title,
            'image'=>$path ??$post->image,
            'content'=>$request->content
        ]);
        return redirect()->route('posts.index',['page'=>$request->page]);
    }


    //delete function
    function destroy($id){
        $post = Post::findOrFail($id);
        // File::delete(public_path($post->image)); //custom disk
        // Storage::disk('public')->delete(public_path($post->image));
        $post->delete();
        // Post::destroy($id);
        return redirect()->route('posts.index');


    }

    //softdelete
    function trashed(){
        $posts= Post::onlyTrashed()->paginate(10);
        return view('posts.trashed',compact('posts'));
    }

    function restore(Request $request ,$id){
        $post = Post::onlyTrashed()->findOrFail($id);
        // $post->update(['deleted_at'=>null]);
        $post->restore();
        return redirect()->route('posts.index');

    }
    function forcedelete(Request $request ,$id){
        $post = Post::onlyTrashed()->findOrFail($id);
        File::delete(public_path($post->image)); //custom disk

        $post->forcedelete();
        return redirect()->route('posts.index');

    }

}
