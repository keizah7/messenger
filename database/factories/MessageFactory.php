<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Message;
use Faker\Generator as Faker;

$factory->define(Message::class, function (Faker $faker) {
    return [
        'from' => \App\User::count() ? \App\User::pluck('id')->random() : null,
        'to' => \App\User::count() ? \App\User::pluck('id')->random() : null,
        'text' => $faker->sentence
    ];
});
