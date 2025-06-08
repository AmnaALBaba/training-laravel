<?php

use App\Http\Middleware\CheckType;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\formController;




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


});


