<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Properties
 * @property int $id
 * @property int $category_id
 * @property string $title
 * @property string $description
 * @property string $publication_date
 * @property string $content
 * @property string $author
 * @property string $photo
 */
class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected $fillable = [
        'category_id',
        'title',
        'description',
        'category',
        'publication_date',
        'content',
        'photo',
        'author',
        'update_date',
    ];

    protected $hidden = [
        'created_at'
    ];

}
