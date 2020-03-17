<?php

use Illuminate\Database\Seeder;

class BlogCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blog_categories')->insert([
           [
            'parent_id' => '1',
            'slug' => 'Php super',
            'title' => 'backend',
            ],
            [
                'parent_id' => '1',
                'slug' => 'maria',
                'title' => 'frontend',
            ],
            [
                'parent_id' => '1',
                'slug' => 'full_tul',
                'title' => 'fullstack',
            ]
        ]);
    }
}
