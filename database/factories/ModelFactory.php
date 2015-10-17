<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$faker->addProvider(new Faker\Provider\pt_BR\Address($faker));
$faker->addProvider(new Faker\Provider\pt_BR\Company($faker));
$faker->addProvider(new Faker\Provider\pt_BR\Payment($faker));
$faker->addProvider(new Faker\Provider\pt_BR\Person($faker));
$faker->addProvider(new Faker\Provider\pt_BR\PhoneNumber($faker));
//$faker->addProvider(new Faker\Provider\pt_BR\check_digit($faker));

$factory->define(\Delivery\Models\User::class, function (Faker\Generator $faker) {
    return [
    'name' => $faker->name,
    'email' => $faker->email,
    'password' => bcrypt(str_random(10)),
    'remember_token' => str_random(10),
    ];
});

$factory->define(\Delivery\Models\Category::class, function (Faker\Generator $faker) {
    return [
    'name' => $faker->text(5),
    ];
});

$factory->define(\Delivery\Models\Product::class, function (Faker\Generator $faker) {
    return [
    'name' => $faker->text(10),
    'description' => $faker->text(10),
    'price' => $faker->numberBetween(10,50),

    ];
});

$factory->define(\Delivery\Models\Client::class, function (Faker\Generator $faker) {
    return [
    'phone' => $faker->phoneNumber(),
    'address'=> $faker->address(),
    'city'=> $faker->city(),
    'state'=> $faker->state(),
    'zipcode'=>$faker->postcode(),
    ];
});

$factory->define(\Delivery\Models\Cupom::class, function (Faker\Generator $faker) {
    return [
     'code'=>rand(100,9999),
     'price'=>rand(50,100),
    ];
});

$factory->define(\Delivery\Models\Order::class, function (Faker\Generator $faker) {
    return [
    'client_id'=>$faker->numberBetween(1,20),
    'user_delivery_man_id'=>rand(21,25),
    'total'=>$faker->numberBetween(10,50),
    'status'=>0,
    ];
});


$factory->define(\Delivery\Models\OrderItem::class, function (Faker\Generator $faker) {
    return [
    //'product_id'=>$faker->numberBetween(1,100),
    //'order_id'=>$faker->numberBetween(1,50),
    //'price'=>$faker->numberBetween(50,1000),
    //'qtd'=>$faker->numberBetween(1,10),
    ];
});