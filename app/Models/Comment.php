<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Comment extends Model
{
    protected $fillable = [
        'message',
        'user_id',
        'post_id'
    ];

    public $timestamps = true;
    public static function where(string $string, $id)
    {

    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {

        return $this->belongsTo(User::class);

    }
    public function post(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {

        return $this->belongsTo(Post::class);

        }
    }
