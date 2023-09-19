<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    // テーブル名
    protected $table = 'likes';

    // 可変項目
    protected $fillable =
    [
        'id',
        'user_id',
        'post_id'
    ];


    public function user()
    {   //usersテーブルとのリレーションを定義するuserメソッド
        return $this->belongsTo(User::class);
    }

    public function post()
    {   //postsテーブルとのリレーションを定義するpostメソッド
        return $this->belongsTo(Post::class);
    }
}
