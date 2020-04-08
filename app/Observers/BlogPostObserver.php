<?php

namespace App\Observers;

use App\Models\BlogPost;
use Carbon\Carbon;

class BlogPostObserver
{
    /**
     * Handle the blog post "created" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function created(BlogPost $blogPost)
    {
        //
    }

    public function creating(BlogPost $blogPost)
    {
//        $test[] = $blogPost->isDirty();
//        dd($test);
        $this->setPublishedAt($blogPost);
        $this->setSlug($blogPost);
        $this->setHtml($blogPost);
        $this->setUser($blogPost);
    }

    /**
     * Handle the blog post "updated" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function updated(BlogPost $blogPost)
    {
        //
    }

    /**
     * Обработка перед обновлением записи
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function updating(BlogPost $blogPost)
    {
//        $test[] = $blogPost->isDirty();
//        dd($test);
        $this->setPublishedAt($blogPost);
        $this->setSlug($blogPost);
    }

    /**
     * Handle the blog post "deleted" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function deleted(BlogPost $blogPost)
    {
        //
    }

    /**
     * Handle the blog post "restored" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function restored(BlogPost $blogPost)
    {
        //
    }

    /**
     * Handle the blog post "force deleted" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function forceDeleted(BlogPost $blogPost)
    {
        //
    }

    public function setPublishedAt(BlogPost $blogPost)
    {
        if(empty($blogPost->published_at) && $blogPost->is_published) {
            $blogPost->published_at = Carbon::now();
        }
    }

    public function setSlug(BlogPost $blogPost)
    {
        If(empty($blogPost->slug)) {
            $blogPost->slug = \Str::slug($blogPost->title);
        }
    }

    protected function setHtml(BlogPost $blogPost)
    {
        If($blogPost->isDirty('content_raw')) {
            // TODO: тут должна быть генерация markdown
            $blogPost->content_html = $blogPost->content_raw;
        }
    }

    protected function setUser(BlogPost $blogPost)
    {

        $blogPost->user_id = auth()->id() ?? BlogPost::UNKNOWN_USER;

    }
}
