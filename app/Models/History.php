<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory; 
    // テーブル名
    protected $table = 'histories';

    // 可変項目
    protected $fillable = 
    [
        'id',
        'user_id',
        'post_id'
    ];
}

?>
