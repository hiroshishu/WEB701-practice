<?php

use Faker\Generator as Faker;

$factory->define(App\Item::class, function (Faker $faker) {
    return [
        'user_id'       => $faker->numberBetween($min=1, $max=100),
        'category_id'   => $faker->numberBetween($min=1, $max=5),
        'title'         => $faker->sentence,
        'description'   => $faker->text($maxNbChars = 200),
        'quantiti'      => $faker->randomDigit,

        'slug'          => str_slug($faker->sentence),
        'end_time'      => $faker->dateTimeBetween($startDate = 'now', $endDate = '+ 3 weeks', $timezone = null, $format = 'Y-m-d H:i:s'),

        'size'          => $faker->numberBetween($min=1, $max=5),
        'color'         => $faker->numberBetween($min=1, $max=5),
        'flavor'        => $faker->numberBetween($min=1, $max=5),
        'price'         => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 9999),

        'phone'         => $faker->phoneNumber,
        'address'       => $faker->address
    ];
});
