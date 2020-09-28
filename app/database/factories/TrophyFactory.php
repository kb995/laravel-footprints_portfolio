<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Trophy;
use Faker\Generator as Faker;

$factory->define(Trophy::class, function (Faker $faker) {
    return [
        'text' => 'texttexttexttexttexttexttexttext',
        'time' =>  now(),
        'date_id' => 1,
    ];
});
