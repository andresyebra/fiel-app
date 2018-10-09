<?php

use Faker\Generator as Faker;

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

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Company::class, function (Faker $faker) {
    return [
        'rfc' => $faker->unique()->regexify('/[A-Z]{3,4}[0-9]{2}(0[1-9]|1[012])(0[1-9]|[12][0-9]|3[01])[A-Z0-9]{2}[0-9A]/'),
        'company' => $faker->company,
        'address' => $faker->address,
        'phone_number' => $faker->phoneNumber,
        'email' => $faker->safeEmail,
        'id_request' => $faker->phoneNumber,
        'area' => $faker->jobTitle,
    ];
});
$factory->define(App\Area::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});