<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//以下より追加
//----------------------------------
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use \Symfony\Component\HttpFoundation\Response;

class RegisterController extends Controller
{

    public function rcreate()
    {
        return view('travels.register');
    }


    public function register(Request $request)
    {
        // return view('travels.register');

        //入力バリデーション
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        //バリデーションで問題があった際にはエラーを返す。
        if ($validator->fails()) {
            return response()->json($validator->messages(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        //バリデーションで問題がなかった場合にはユーザを作成する。
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);


        return redirect()->route('index');

        // return response()->json('User registration completed', Response::HTTP_OK);
    }
}
