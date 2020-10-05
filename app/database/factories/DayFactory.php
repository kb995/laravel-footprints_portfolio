<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Day;
use Faker\Generator as Faker;

$factory->define(Day::class, function (Faker $faker) {
    return [
        'date' => date("Y-m-d"),
        'user_id' => 1,
    ];
});
