<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/',[\App\Http\Controllers\HomeController::class,'welcome'])->name('welcome');

Auth::routes();
Route::group(['middleware' => ['auth']],function (){

    Route::resource('projectCategories',\App\Http\Controllers\ProjectCategoryController::class);
    Route::resource('blogCategories',\App\Http\Controllers\BlogCategoryController::class);
    Route::resource('user',\App\Http\Controllers\UserController::class);
    Route::resource('project',\App\Http\Controllers\ProjectController::class);
    Route::resource('projectPhoto',\App\Http\Controllers\ProjectPhotoController::class);
    Route::post('/user/upgradeAdmin', [\App\Http\Controllers\UserController::class, 'upgradeAdmin'])->name('user.upgradeAdmin');

});

Route::get('/redirect/{name}',[\App\Http\Controllers\Auth\LoginController::class,'redirect'])->name('redirect.name');
Route::get('/callback/{name}',[\App\Http\Controllers\Auth\LoginController::class,'callBack'])->name('callback.name');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
