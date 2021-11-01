<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Dashboard\Blog;
use Faker\Generator as Faker;

$factory->define(Blog::class, function (Faker $faker) {
    return [
        'title'=>$faker->text(80),
        'body'=>$faker->text(500),
        'hasMedia'=>0,
        'time_read'=>10,
        'created_by'=>1,
        'updated_by'=>1,
        'viewed'=>0,
        'image'=>'https://lh3.googleusercontent.com/a-/AOh14Ghs5L6CLb18p7wNDtq5MNGSH4N3ZxaJ6wQ0HttQTA=s96-c'
    ];
});
