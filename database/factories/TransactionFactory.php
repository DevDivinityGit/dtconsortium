<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use Faker\Generator as Faker;
use App\Transaction;

$factory->define(Transaction::class, function (Faker $faker) {
    return [
        'transaction_id' => rand(50, 500),
        'user_id' => rand(1, 5),
        'amount' => rand(100, 5000),
        'image' => 'uploads/transaction_images/avatar.jpg',
        'status' => 'inprogress',
        'usdt_address' => 'defaultusdtaddress',
        'purpose_id' => rand(1, 2),




    ];
});
