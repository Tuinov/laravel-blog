<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BlogCategory
 *
 * @property-read BlogCategory $parentCategory
 * @property-read string $parentTitle
*/

class BlogCategory extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'parent_id',
        'description',
    ];

    /**
     * Получить родительскую категорию
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parentCategory()
    {
        return $this->belongsTo(BlogCategory::class, 'parent_id', 'id');
    }

    public function getParentTitleAttribute()
    {
        $title = $this->parentCategory()->title
            ?? ($this->isRoot() ? 'корень' : '???');

        return $title;
    }

    public function isRoot()
    {
        return $this->id === 1;
    }
}
