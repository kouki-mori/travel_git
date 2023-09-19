<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//以下より追加
//-----------------------------------
// use App\Http\Requests\LoginFormRequest;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Hash;
use \Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;



class LoginController extends Controller
{
    public function showLogin()
    {
        return view('travels.login');
    }


    public function login(Request $request)
    {
        // バリデーション
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if ($validator->fails()) {
            // 失敗時の処理
        }

        // ユーザーの取得
        $user = User::where('email', $request->email)->first();

        // 取得できない場合、パスワードが不一致の場合エラー
        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        // ログイン処理


        return redirect()->route('index_member');
    }

    public function logout()
    {

    }
}
