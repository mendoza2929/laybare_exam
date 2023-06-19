<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('admin')->group(function(){

    Route::get('dashboard',[App\Http\Controllers\Admin\DashboardController::class, 'index']);

    //catergory routes

    Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function () {
        Route::get('/category' , 'index');
        Route::get('/category/create' , 'create');
        Route::post('/category' , 'store');
        Route::get('/category/{category}/edit' , 'edit');
        Route::put('/category/{category}', 'update');
        Route::get('/category/{category_id}/delete','destroy');
    });

    //user manager routes

    Route::controller(App\Http\Controllers\Admin\UserController::class)->group(function () {
        Route::get('/user' , 'index');
        Route::get('/user/create' , 'create');
        Route::post('/user', 'userstore');
        Route::get('/user/{user}/edit' , 'edit');
        Route::put('/user/{user}', 'update');
        Route::get('/user/{user_id}/delete','destroy');
    });

    //products routes

    Route::controller(App\Http\Controllers\Admin\ProductController::class)->group(function () {
        Route::get('/product','index');
        Route::get('/product/create','create');
        Route::post('/product','productstore');
        Route::get('/product/{product}/edit','edit');
        Route::put('/product/{product}', 'update');
        Route::get('/product/{product_id}/delete','destroy');
        Route::get('product-image/{product_image_id}/delete','destroyImage');

    });

});
