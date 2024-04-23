<?php

namespace App\Models;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Comment;


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
 * Appends
 * @property string $url
 * @property  $qr_code
 *
 * Relations
 * @property Category $category
 */
class Post extends Model
{
    use HasFactory;

    /**
     * @var mixed|string
     */
    public mixed $qr_code_path;
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

    protected $appends = [
        'url',
        'qr_code'
    ];

    protected $hidden = [
        'created_at'
    ];

    public static function find($id)
    {

    }

    public static function findOrFail($id)
    {

    }

    public function getUrlAttribute(): \Illuminate\Foundation\Application|string|\Illuminate\Contracts\Routing\UrlGenerator|\Illuminate\Contracts\Foundation\Application
    {
        return url("/post/{$this->id}");
    }

    public function getQrCodeAttribute()
    {
        return QrCode::encoding('UTF-8')
            ->color(40, 40, 40)
            ->size(100)
            ->format('svg')
            ->generate($this->url);
    }


    /**
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

public function comments(): \Illuminate\Database\Eloquent\Relations\HasMany
{
    return $this->hasMany(Comment::class);
}

}
