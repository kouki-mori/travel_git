<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Like;

class Post extends Model
{
    use HasFactory;
    // テーブル名
    protected $table = 'posts';

    // 可変項目
    protected $fillable =
    [
        'id',
        'theme',
        'area',
        'address',
        'comment',
        'image',
        'user_id',
        'likes_count'
    ];

    public $timestamps = false;


    public function likesCount()
    {
        return $this->likes()->count();
    }


    public function likes()
    {
        return $this->hasMany(Like::class);
    }


    public function likedByCurrentUser()
    {
        // 現在のユーザーがこの投稿を「いいね」しているかどうかを確認するロジックを実装する
        $user = auth()->user(); // 現在のログインユーザーを取得

        //ユーザーがいいねした投稿を取得し、この投稿がその中にあるかどうかを確認
        return $user->likes->contains('post_id', $this->id);
    }


    // public function isLikedByAuthUser()
    // {
    //     if (auth()->check()) {
    //         $user_id = auth()->id();
    //         return $this->likes->where('user_id', $user_id)->count() > 0;
    //     }
    //     return false;
    // }
}
