<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


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
 *
 * Relations
 * @property Category $category
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
        'video_url',
    ];

    protected $hidden = [
        'created_at'
    ];

    /**
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
