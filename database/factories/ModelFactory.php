<?php

use Faker\Generator as Faker;

$factory->define(App\Investor::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('secret'),
    ];
});

$factory->define(App\Company::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'logo' => $faker->randomElement([
            'http://via.placeholder.com/350x150',
            'http://via.placeholder.com/200x200',
            'http://via.placeholder.com/150x350',
        ]),
    ];
});

$factory->define(App\Investment::class, function (Faker $faker, $data) {
    return [
    	'investor_id' => $data['investor_id'],
    	'company_id' => $data['company_id'],
        'amount' => $faker->numberBetween(100, 10000),
        'fees' => $faker->randomElement([7, 50, 125, 1000]),
    ];
});