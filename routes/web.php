<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Models\Post;

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

 


Route::get('/', function () {
    $posts = [];

    if (auth()->check()) {
        $posts = auth()->user()->usersCoolPosts()->latest()->get();
    }

    return view('home', ['posts' => $posts]);
});


Route::post('/register', [UserController::class,'register']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);

//blog post related routes

Route::post('/create-post',[PostController::class, 'createpost']);
Route::get('edit-post/{post}',[PostController::class,'showEditscreen']);
Route::put('edit-post/{post}',[PostController::class,'actuallyupdatepost']);
Route::delete('delete-post/{post}',[PostController::class,'deletepost']);

