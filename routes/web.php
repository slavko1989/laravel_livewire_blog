<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PostController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[HomeController::class,'index'])->name('home');

Route::group(['middleware'=>['auth'],'prefix'=>'dashboard'],function(){
    Route::group(['prefix'=>'','as'=>'dashboard.'],function(){
        Route::get('/',[DashboardController::class,'index'])->name('index');
});
Route::resource('categories', CategoryController::class);

        //CATEGORIES
        Route::group(['prefix' => 'categories', 'as' => 'categories.'],function(){
            Route::get('/',[CategoryController::class,'index'])->name('index');
            Route::get('create',[CategoryController::class,'create'])->name('create');
            Route::post('/',[CategoryController::class,'store'])->name('store');
            Route::get('{category:slug}/edit',[CategoryController::class,'edit'])->name('edit');
            Route::put('{category:slug}',[CategoryController::class,'update'])->name('update');
            Route::delete('{category:slug}/delete',[CategoryController::class,'destroy'])->name('destroy');  
    });


        //TAGS
        Route::group(['prefix' => 'tags', 'as' => 'tags.'],function(){
            Route::get('/',[TagController::class,'index'])->name('index');
            Route::get('create',[TagController::class,'create'])->name('create');
            Route::post('/',[TagController::class,'store'])->name('store');
            Route::get('{tag:slug}/edit',[TagController::class,'edit'])->name('edit');
            Route::put('{tag:slug}',[TagController::class,'update'])->name('update');
            Route::delete('{tag:slug}/delete',[TagController::class,'destroy'])->name('destroy');  
    });

           //POST
        Route::group(['prefix' => 'posts', 'as' => 'posts.'],function(){
            Route::get('/',[PostController::class,'index'])->name('index');
            Route::get('create',[PostController::class,'create'])->name('create');
            Route::post('/',[PostController::class,'store'])->name('store');
            Route::get('{post:slug}/edit',[PostController::class,'edit'])->name('edit');
            Route::get('{post:slug}/show',[PostController::class,'show'])->name('show');
            Route::put('{post:slug}',[PostController::class,'update'])->name('update');
            Route::delete('{post:slug}/delete',[PostController::class,'destroy'])->name('destroy');  
    });
});








