<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::prefix('/posts')->name('posts.')->controller(PostController::class)->group(function()
{
    //index
    Route::get('/' ,'index')->name('index');
    //create new post
    Route::get('/create' ,'create')->name('create');
    Route::post('/' ,'store')->name('store');

    //update an existing post
     Route::get('{id}/edit' ,'edit')->name('edit');
    Route::put('/{id}' ,'update')->name('update');

    //delete post
    Route::delete('/{id}' , 'destroy')->name('destroy');


});


//SoftDelete

Route::get('trashed-posts' , [PostController::class , 'trashed'])->name('posts.trashed');
Route::get('trashed-posts/{id}/restore' , [PostController::class , 'restore'])->name('posts.restore');
Route::delete('trashed-posts/{id}/forcedelete' , [PostController::class , 'forcedelete'])->name('posts.forcedelete');

