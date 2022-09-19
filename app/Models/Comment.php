<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment',
        'voice_id',
        'user_id',
    ];

    public function voice()
    {
        return $this->belongsTo(Voice::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
