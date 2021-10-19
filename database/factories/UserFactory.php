<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => 'Omani',
        'email' => 'omani@tqanah.com',
        'email_verified_at' => now(),
        'password' => Hash::make('tqanah123'),
        'avatar' => 'https://lh3.googleusercontent.com/a-/AOh14Ghs5L6CLb18p7wNDtq5MNGSH4N3ZxaJ6wQ0HttQTA=s96-c',
        'remember_token' => Str::random(10),
    ];
});
