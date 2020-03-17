<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\HdUsers;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(HdUsers::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstNameMale,
        'middle_name' => $faker->firstNameMale,
        'last_name' => $faker->lastName ,

        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'email' => $faker->unique()->safeEmail,
        'phone_number' => $faker->e164PhoneNumber,
        //'remember_token' => Str::random(10),
        'city_id' => $faker->randomDigit,
        //'foto')=>nullable();
        //'validate')=>;
        'date_last_login' => $faker->date($format = 'Y-m-d', $max = 'now')
    ];
});
