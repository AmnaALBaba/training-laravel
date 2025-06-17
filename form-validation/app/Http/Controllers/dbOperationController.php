<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class dbOperationController extends Controller
{
    public function index(){

        //CRUD operation using Query Builder
        //C =>Create =>insert

        // $course = DB::table('courses')->insert([
        //     'title'=>'Web Development',
        //     'slug'=>'Web Development',
        //     'description'=>'lorem',
        //     'image'=>'https://via.placeholder.com/200x200',
        //     'price'=>0,
        //     'category'=>'programming',
        //     'author'=>'amna'


        // ]);
        // dd($course);


           //R =>Read =>select or get
        //    $course = DB::table('courses')->get();
        //    dd($course);

        //    $course = DB::table('courses')->where('id',2)->firstorfail();
        //    dd($course);


        //U =>update
        // $course = DB::table('courses')->where('id',2)->update([
        //     'title'=>'Web Development 2'
        // ]);

        // dd(DB::table('courses')->get());

        //D=>Delete

        $course = DB::table('courses')->where('id',2)->delete();
        dd(DB::table('courses')->get());



    }

    public function courses(){
          $courses = DB::table('courses')->latest('id')->paginate(10);
          return view('db.courses',compact('courses'));
    }
}
