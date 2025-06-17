<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\CourseRequest;

class courseController extends Controller
{
    function index(){
        $courses = Course::latest('id')->paginate(10);
        return view('courses.index' , compact('courses'));
    }
    function create(){
        return view('courses.create');
    }

    function store(CourseRequest $request){
        //upload image
        $path = $request->file('image')->store('uploads','custom');
        //using object
        // $course = new Course();
        // $course->title = $request->title;
        // $course->slug = Str::slug($request->title);
        // $course->image = $path;
        // $course->price = $request->price;
        // $course->category = $request->category;
        // $course->description = $request->description;
        // $course->save();


        //using create
        Course::create([
            'title'=>$request->title,
            'slug'=>Str::slug($request->title),
            'price'=>$request->price,
            'category'=>$request->category,
            'description'=>$request->description,
            'image'=>$path
        ]

        );
return redirect()->route('course.index');

    }

function destroy($id){
    $course = Course::findOrFail($id);
    $course->delete();
    return redirect()->route('course.index');


}
}
