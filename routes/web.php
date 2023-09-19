<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TravelsController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PasswordResetController;



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

// // 非会員用メイン画面を表示
// Route::get('/', 'App\Http\Controllers\TravelsController@index')->name('index');
// // 会員用画面を表示
// Route::get('/index_member', 'App\Http\Controllers\TravelsController@index_member')->name('index_member'); 

// // 投稿登録画面を表示
// Route::get('/travels/create', 'App\Http\Controllers\TravelsController@showCreate')->name('create');
// // 投稿登録
// Route::post('/travels/store', 'App\Http\Controllers\TravelsController@exeStore')->name('store');


// 非会員用メイン画面を表示
Route::get('/', 'App\Http\Controllers\TravelsController@index');
Route::get('/index', 'App\Http\Controllers\TravelsController@index')->name('index');


Route::middleware(['web', 'auth'])->group(function () {
    // ログインユーザーのみがアクセスできるルートを定義
    // 会員用画面を表示
    Route::get('/index_member', 'App\Http\Controllers\TravelsController@index_member')->name('index_member');
    // 投稿登録画面を表示
    Route::get('/travels/create', 'App\Http\Controllers\TravelsController@showCreate')->name('create');
    // 投稿登録
    Route::post('/travels/store', 'App\Http\Controllers\TravelsController@exeStore')->name('store');

    // 投稿詳細画面を表示
    Route::get('/travels/{id}', 'App\Http\Controllers\TravelsController@showDetail')->name('show');
    // 投稿編集画面
    Route::get('/travels/edit/{id}', 'App\Http\Controllers\TravelsController@edit')->name('edit');
    // 投稿編集を更新する
    Route::post('/travels/update', 'App\Http\Controllers\TravelsController@exeUpdate')->name('update');
    // 投稿を削除する
    Route::post('/travels/delete/{id}', 'App\Http\Controllers\TravelsController@delete')->name('delete');
    // 検索結果画面を表示する
    Route::post('/travels/search', 'App\Http\Controllers\TravelsController@search')->name('search');
    // いいねボタン
    Route::post('/travels/like', 'App\Http\Controllers\LikeController@like')->name('like');
    // いいね削除
    Route::delete('/travels/like/{id}', 'App\Http\Controllers\LikeController@unlike')->name('unlike');

    // いいね一覧画面を表示する
    Route::get('/like_list', 'App\Http\Controllers\TravelsController@like_list')->name('like_list');

    // ユーザー情報画面表示
    Route::get('/user_info', 'App\Http\Controllers\AuthController@userShow')->name('userShow');

    // パスワード変更画面
    Route::get('/change_password', 'App\Http\Controllers\AuthController@showReset')->name('password.change');
    Route::post('/change_password', 'App\Http\Controllers\AuthController@changePassword')->name('change_password');
});


// 新規登録・ログイン機能
Route::get('/register', 'App\Http\Controllers\AuthController@rcreate')->name('rcreate');
Route::post('/register', 'App\Http\Controllers\AuthController@register')->name('register');
Route::get('/login', 'App\Http\Controllers\AuthController@showLogin')->name('showLogin');
Route::post('/login', 'App\Http\Controllers\AuthController@login')->name('login');
Route::post('/logout', 'App\Http\Controllers\AuthController@logout')->name('logout'); // ログアウト




// // パスワードリセットリンク送信画面
// Route::get('/reset_request', 'App\Http\Controllers\AuthController@showReset')->name('showReset');
// Route::post('/reset_request', 'App\Http\Controllers\AuthController@sendResetLinkEmail')->name('reset_request');

// // パスワードリセットルート
// Route::get('/reset_password', 'App\Http\Controllers\AuthController@showResetForm')->name('password.reset');
// Route::post('/reset_password', 'App\Http\Controllers\AuthController@reset')->name('reset');
