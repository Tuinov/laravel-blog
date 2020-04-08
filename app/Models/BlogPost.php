<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BlogPost
 *
 * @package App\Model
 *
 * @property \App\Models\BlogCategory $category
 * @property \App\Models\User $user
 * @property string $title
 * @property string $slug
 * @property string $excerpt
 * @property string $content_html
 * @property string $content_raw
 * @property boolean $is_published
 * @property string $published_at
 *
*/
class BlogPost extends Model
{
    use SoftDeletes;

    const UNKNOWN_USER = 1;

    protected $fillable
        = [
            'title',
            'slug',
            'category_id',
            'excerpt',
            'content_raw',
            'is_published',
            'published_at',

        ];

    public function category()
    {
        // статья пренадлежит категории
        return $this->belongsTo(BlogCategory::class);
    }
}
