<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Dashboard\Blog;
use Faker\Generator as Faker;

$factory->define(Blog::class, function (Faker $faker) {
    return [
        'title'=>$faker->word(3),
        'body'=>$faker->text(500),
        'hasMedia'=>0,
        'created_by'=>1,
        'updated_by'=>1,
        'viewed'=>0,
        'category_id'=>1,
        'image'=>'image-blog-default.png'
    ];
});
