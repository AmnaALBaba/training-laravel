<?php

use App\Http\Middleware\CheckType;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\formController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\courseController;
use App\Http\Controllers\dbOperationController;




Route::prefix('forms')->name('forms.')->controller(formController ::class)->group(function(){
    //form1
    Route::get('/form1' , 'form1')->name('form1');
    Route::post('/form1' , 'form1_data');
    //form2
    Route::get('/form2' , 'form2')->name('form2');
    Route::post('/form2' , 'form2_data');
    //form3
    Route::get('/form3' , 'form3')->name('form3');
    Route::post('/form3' , 'form3_data');
    //form4
    Route::get('/form4' , 'form4')->name('form4');
    Route::post('/form4' , 'form4_data');


});


Route::get('/db' , [dbOperationController::class , 'index']);
// Route::get('/courses' , [dbOperationController::class , 'courses']);

//CRUD operation using ORM
Route::get('/courses' , [courseController::class , 'index'])->name('course.index');
Route::get('/courses/create' , [courseController::class , 'create'])->name('course.create');
Route::post('/courses' , [courseController::class , 'store'])->name('course.store');
Route::delete('/courses/{id}',[courseController::class , 'destroy'])->name('course.destroy');


//post

Route::get('/posts' , [PostController::class , 'index'])->name('posts.index');
Route::get('/posts/create' , [PostController::class , 'create'])->name('posts.create');
Route::post('/posts' , [PostController::class , 'store'])->name('posts.store');

