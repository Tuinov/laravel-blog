<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogPostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $title = 'статья номер ноль';
        $slug = Str::slug($title, '-');
        $data = [
            'category_id' => 1,
            'user_id' => 1,
            'title' => $title,
            'slug' => $slug,


            'excerpt' => 'text',
            'content_raw' => 'text',
            'content_html' => 'text',

            'is_published' => 0,

        ];


        DB::table('blog_posts')->insert($data);
    }
}
