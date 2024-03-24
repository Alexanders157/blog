<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $title
 * @property string $description
 */
class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected $fillable = [
        'title',
        'description',
        'category',
        'publication_date',
        'content',
        'author',
        'update_date',
    ];

    protected $hidden = [
        'created_at'
    ];

}
