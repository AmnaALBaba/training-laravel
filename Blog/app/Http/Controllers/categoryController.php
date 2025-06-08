<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class categoryController extends Controller
{
    //create a new category
    public function create(Request $request){
        $category  = new Category();
        $category->create([
            'name'=>$request->name,
            'created_by'=>auth()->user()->id

        ]);
        return redirect('/admin');
    }
    //delete an existing category
    public function del_category(Request $request){
        $category  = new Category();
        $category  = $category->find($request->id);
        $category->delete();
        return redirect('/admin');
    }

}
