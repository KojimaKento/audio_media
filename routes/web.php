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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';




Route::get('/index', function () {
    return view('index');
});

// ユーザー関連

//ユーザーログイン、新規登録画面
Route::get('/user/login',[App\Http\Controllers\UserController::class, "login"])
    ->name("user.login");
Route::get('/user/register',[App\Http\Controllers\UserController::class, "register"])
    ->name("user.register");


//ユーザーマイページ
Route::get('/user',[App\Http\Controllers\UserController::class, "show"])
    ->name("user");

//ユーザー情報編集
Route::get('/user/edit',[App\Http\Controllers\UserController::class, "edit"])
    ->name("edit");
Route::post('/user/edit',[App\Http\Controllers\UserController::class, "update"])
    ->name("update");



Route::get('/voice/index',[App\Http\Controllers\UploadController::class, "index"])
    ->name("upload.index");



// 音声投稿について

Route::get('/voice/post',[App\Http\Controllers\UploadController::class, "show"])
    ->name("upload.show");

Route::post('/voice/post',[App\Http\Controllers\UploadController::class, "post"])
    ->name("upload.post");

// 投稿の詳細ページ
Route::get('/voice/content/{id}/',[App\Http\Controllers\UploadController::class, "content"])
    ->name("content");

Route::post('/voice/content/post/{id}/',[App\Http\Controllers\CommentController::class, "post"])
    ->name("comment.post");

Route::get('/voice/content/commented/',[App\Http\Controllers\CommentController::class, "commented"])
    ->name("commented");


Route::post('/like',[App\Http\Controllers\UploadController::class, "like"])
    ->name('voice.like');