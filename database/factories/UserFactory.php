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
        'empresa' => $faker->randomElement(['Empresa 1','Empresa 2','Empresa 3']),
        'area' => $faker->randomElement(['Area 1','Area 2','Area 3']),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Company::class, function (Faker $faker) {
    return [
        'clave' => $faker->unique()->randomNumber(),
        'descripcion' => $faker->randomElement(['Empresa 1','Empresa 2','Empresa 3']),
        'area' => $faker->randomElement(['Area 1','Area 2','Area 3']),
    ];
});

$factory->define(App\Area::class, function (Faker $faker) {
    return [
        'clave' => $faker->unique()->randomNumber(),
        'descripcion' => $faker->randomElement(['Area 1','Area 2','Area 3']),
    ];
});

$factory->define(App\Employee::class, function (Faker $faker) {
    return [
        'clave' => $faker->unique()->randomNumber(),
        'nombre' => $faker->name,
        'curp' =>  strtoupper(str_random(18)),
        'imss' => $faker->unique()->regexify('/[0-9]{11}/'),
        'empresa' => $faker->randomElement(['Empresa 1','Empresa 2','Empresa 3']),
        'area' => $faker->randomElement(['Area 1','Area 2','Area 3']),
    ];
});

$factory->define(App\Job::class, function (Faker $faker) {
    return [
        'descripcion' => $faker->jobTitle,
        'empresa' => $faker->randomElement(['Empresa 1','Empresa 2','Empresa 3']),
    ];
});

$factory->define(App\Resignation::class, function (Faker $faker) {
    return [
        'descripcion' => $faker->jobTitle,
    ];
});

$factory->define(App\Licence::class, function (Faker $faker) {
    return [
        'licencia' => '18A01A181F',
        'fecha_inicial' => '2019-01-01',
        'fecha_final' => '2019-12-31',
        'tipo' => 'A',
        'empresa' => '1',
        'observacion' => '01',
    ];
});