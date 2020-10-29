<?php

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

// 投稿一覧画面を表示（トップ画面)
Route::get('/', 'PostsController@index')->name('top');
//投稿の作成と保存と詳細と編集
Route::resource('posts','PostsController',['only' => ['create','store','show','edit','update','destroy']]);

// コメントを保存
Route::resource('comments','CommentsController',['only' => ['store']]);
