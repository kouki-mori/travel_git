<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LikeController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// // localhost/api/testにgetすると…
// Route::get('/test', function () {
//     return 'api is working!';
// });

// //ログインしたユーザーのみが/hogeにアクセスできる。
// Route::middleware('auth:sanctum')->group(function () {
//     Route::get('/hoge', function () {
//         return 'auth is working!!';
//     });
// });

// Route::post('/tokens/create', function (Request $request) {
//     $token = $request->user()->createToken($request->token_name);

//     return ['_token' => $token->plainTextToken];
// });


// Route::get('/register', [RegisterController::class, 'rcreate'])->name('rcreate');// ユーザー登録
// Route::post('/register', [RegisterController::class, 'register'])->name('register'); // ユーザー登録
// Route::get('/login', [LoginController::class, 'showLogin'])->name('showLogin'); // ログイン
// Route::post('/login', [LoginController::class, 'login'])->name('login'); // ログイン
// Route::post('/login', [LoginController::class, 'login'])->name('login'); // ログイン

// いいねボタン
Route::post('/travels/like', 'App\Http\Controllers\LikeController@like')->name('like');
