<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function voice()
    {
        return $this->belongsTo(Voice::class);
    }

    public function like_exist($id, $voice_id)
    {
        // Likesテーブルのレコードにユーザーidと投稿idが一致するものを取得
        $exist = Like::where('user_id', '=', $id)->where('voice_id', '=', $voice_id)->get();

        // レコード($exist)が存在するなら
        if (!$exist->isEmpty()) {
            return true;
        } else {
        // レコード($exist)が存在しないなら
            return false;
        }
    }
}
