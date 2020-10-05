<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Trophy;
use Faker\Generator as Faker;

$factory->define(Trophy::class, function (Faker $faker) {
    return [
        'trophy' => rand(1, 3),
        'time' =>  now(),
        'text' => 'サンプルテキスト',
        'date_id' => 1,
    ];
});
