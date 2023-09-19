<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// use宣言追加
use App\Models\Post;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;



class LikeController extends Controller
{

    
    public function like(Request $request)
    {

        // $user_id = auth()->id();
        // $post_id = $request->input('post_id');
    
        // // いいねを追加
        // Like::create([
        //     'user_id' => $user_id,
        //     'post_id' => $post_id
        // ]);
    
        // // いいねのカウントを取得
        // $likesCount = Like::where('post_id', $post_id)->count();
    
        // return response()->json(['action' => 'like', 'likes' => $likesCount]);
        

        $user_id = auth()->id(); // ログインユーザーのIDを取得
        $post_id = $request->input('post_id'); // リクエストからpost_idを取得

        

        $existing_like = Like::where('user_id', $user_id)
            ->where('post_id', $post_id)
            ->first(); // 既にいいねしているか確認

        if ($existing_like) {
            // 既にいいねしている場合は削除
            $existing_like->delete();
            $action = 'unlike'; // 削除したアクションを設定
        } else {
            // いいねしていない場合は追加
            Like::create([
                'user_id' => $user_id,
                'post_id' => $post_id
            ]);
            $action = 'like'; // 追加したアクションを設定
        }

        // アクションをJSONとして返す
        return response()->json(['action' => $action]);
    }



    public function unlike(Request $request, $id)
    {
        $user_id = auth()->id();
        $post_id = $id;
    
        // いいねを削除
        Like::where('user_id', $user_id)->where('post_id', $post_id)->delete();
    
        // いいねのカウントを取得
        $likesCount = Like::where('post_id', $post_id)->count();
    
        return response()->json(['action' => 'unlike', 'likes' => $likesCount]);
    }
}


