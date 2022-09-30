<?php

use Illuminate\Database\Seeder;
use App\Transaction;
class TransactionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Transaction', 20)->create();
    }
}
