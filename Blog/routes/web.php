<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\postController;
use App\Http\Controllers\userController;
use App\Http\Controllers\categoryController;

//home page
Route::get('/',function(){
    return view('blog.home');
})->name('home');

//post page
Route::get('/post/{id}',function($id){
    return view('blog.single',compact('id'));
})->name('single-post');

//posts category
Route::get('/category/{id}/{name}',function($id,$name){
    return view('blog.category',compact('id','name'));
})->name('category-group');


Route::middleware('authMiddleware')->group(function(){

//category route
Route::get('/admin',function(){
    return view('admin.categories');}
 )->name('admin');

Route::post('/create_category',[categoryController::class , 'create'] )->name('create-category');

Route::get('/del_category/{id}',[categoryController::class , 'del_category'] )->name('delete-category');

//posts route
Route::get('/admin/posts',function(){
    return view('admin.posts');}
 )->name('post');

Route::post('/create_post',[postController::class , 'create'] )->name('create-post');

Route::get('/del_post/{id}',[postController::class , 'del_post'] )->name('delete-post');

//users route
Route::get('/admin/users',function(){
    return view('admin.users');}
)->name('user');

Route::post('/create_user',[userController::class , 'create'] )->name('create-user');

Route::get('/del_user/{id}',[userController::class , 'del_user'] )->name('delete-user');


//logout
Route::get('/logout',[userController::class , 'logout'] );
})->name('logout');


//login route
Route::get('/login',function(){
    return view('admin.login');}
)->name('logout');

Route::post('/login',[userController::class , 'login'] );
