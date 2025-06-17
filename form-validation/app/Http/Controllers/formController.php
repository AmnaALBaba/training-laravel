<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\form3Request;

class formController extends Controller
{
    //form1 method
    function form1(){
        return view('forms.form1');
    }
    function form1_data(Request $request){
        $name = $request->input('name');

        return $name;
    }

    //form2 method
    function form2(){
        return view('forms.form2');
    }
    function form2_data(Request $request){

        $data = $request->name;
        return $data;




    }

    //form3 method
    function form3(){
        return view('forms.form3');
    }
    function form3_data(Request $request){

        $request->validate([
            'name'=>['required' , 'min:3'],
            'email'=>['required' ,'email', 'ends_with:@gmail.com'],
            'phone'=>['required','max:10'],
            'password'=>['required'  , 'confirmed']

        ]);
        // @dd($request->validated());
    }
    //form3 method
    function form4(){
        return view('forms.form4');
    }
    function form4_data(Request $request){

        if($request->hasFile('image')){
            //  $path = $request->file('image')->store('uploads' , 'public ');
             $path = $request->file('image')->store('uploads' , 'custom');
            //  $name =time().rand().$request->file('image')->getClientOriginalName();
            //  $equest->file('image')->move('uploads' ,$name );


        }

        return 'file uploaded |'.$path;



    }
}
