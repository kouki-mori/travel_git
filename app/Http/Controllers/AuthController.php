<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Password;


class AuthController extends Controller
{
    public function rcreate()
    {
        $previouslyEnteredEmail = session('previouslyEnteredEmail');
        $previouslyEnteredPassword = session('previouslyEnteredPassword');
        return view('travels.register', compact('previouslyEnteredEmail', 'previouslyEnteredPassword'));
    }

    public function register(Request $request)
    {
        // ユーザーの新規登録ロジックを実装
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required',
        ], [
            'name.required' => '名前は必須です。',
            'email.required' => 'メールアドレスは必須です。',
            'email.email' => '有効なメールアドレスを入力してください。',
            'password.required' => 'パスワードは必須です。',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // 入力した情報をセッションに保持
        session(['previouslyEnteredEmail' => $request->email]);
        session(['previouslyEnteredPassword' => $request->password]);

        return redirect()->route('index')->with('success', 'ユーザーが登録されました');
    }




    public function showLogin()
    {
        $previouslyEnteredEmail = session('previouslyEnteredEmail');
        $previouslyEnteredPassword = session('previouslyEnteredPassword');
        return view('travels.login', compact('previouslyEnteredEmail', 'previouslyEnteredPassword'));
    }

    public function login(Request $request)
    {
        // バリデーション
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'メールアドレスは必須です。',
            'email.email' => '有効なメールアドレスを入力してください。',
            'password.required' => 'パスワードは必須です。',
        ]);

        // 認証を試行し、ユーザーをログインさせる
        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']])) {
            // ログイン成功時の処理
            return redirect()->route('index_member');
        }

        // 入力した情報をセッションに保持
        session(['previouslyEnteredEmail' => $request->email]);
        session(['previouslyEnteredPassword' => $request->password]);

        // ログイン失敗時の処理
        return back()->withErrors(['email' => '認証に失敗しました。'])->withInput();
    }


    // ログアウト機能
    public function logout()
    {
        Auth::logout();

        return redirect()->route('index');
    }


    // ユーザー情報画面表示
    public function userShow()
    {
        $user = Auth::user();
        return view('travels.user_info', compact('user'));
    }



    // パスワード変更画面の表示
    public function showReset()
    {
        return view('travels.change_password');
    }

    public function changePassword(Request $request)
    {

        $request->validate([
            'password' => 'required',
            'new_password' => 'required',
        ]);

        $user = Auth::user();

        if (Hash::check($request->password, $user->password)) {
            $user->update([
                'password' => Hash::make($request->new_password),
            ]);

            return redirect()->route('index_member')->with('success', 'パスワードが変更されました！');
        } else {
            return redirect()->route('password.change')->withErrors(['password' => '現在のパスワードが正しくありません！']);
        }
    }

}
