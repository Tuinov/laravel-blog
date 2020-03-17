<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'автор неизвестен',
                'email' => 'author@mail.ru',
                'password' =>bcrypt('123123'),
            ],
            [
                'name' => 'автор',
                'email' => 'authorste@mail.ru',
                'password' =>bcrypt('123123'),
            ],
        ];

        DB::table('users')->insert($data);

    }
}
