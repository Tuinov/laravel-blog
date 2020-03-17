<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
           [
            'title' => 'Php super',
            'intro' => 'Php super - bla bla!!!',
            'body' => 'blabla blargvsrtbsdr test!',
            ],
            [
                'title' => 'java super',
                'intro' => 'java super - bla bla!!!',
                'body' => 'blabla blargvsrtbsdr test!',
            ],
            [
                'title' => 'js super',
                'intro' => 'js super - bla bla!!!',
                'body' => 'blabla blargvsrtbsdr test great!',
            ]
        ]);
    }
}
