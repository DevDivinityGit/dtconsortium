<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;
use App\Address;

class WithdrawalController extends Controller
{
    public function requested()
    {
        $amount = request()->amount;
        $user = request()->user();
        $usdt_address = request()->usdt_address;

        $minPro = 10;
        $maxOrd = 10;








        if(empty($usdt_address)) {
            return json_encode(['errors' => true, 'data' => 'usdt address field is required']);
        }

//        elseif(!Address::where('address', $usdt_address)->first()) {
//
//            return json_encode(['errors' => true, 'data' => 'usdt address field is wrong']);
//
//
//
//        }













        if($user->plan_id === 1) {

            if($amount>$maxOrd) {


                return json_encode(['errors' => true, "Can't withdraw more than ".$maxOrd]);



            }


        }







        if(empty($amount)) {
            return json_encode(['errors' => true, 'data' => 'amount field is required']);
        }

        if($amount > $user->current_balance) {

            return json_encode(['errors' => true, 'data' => 'Balance insufficient']);


        }


        $todayTrs = Transaction::where('user_id', $user->id)
            ->where('purpose_id', 1)
            ->whereDay('created_at', date('d'))->get();




        if($todayTrs->count() > 0) {

            return json_encode(['errors' => true, 'data' => 'withdrawal request already submitted']);


        }





             if($user->plan_id === 1) {

                 if(Transaction::where('user_id', $user->id)->get()->count()>=3) {



                     return json_encode(['errors' => true, 'data' => 'ordinary user withdrawal limit reached']);






                 }




             }



             $attr = [

                 'transaction_id' => rand(50, 500),
                 'user_id' => $user->id,
                 'amount' => $amount,
                 'image' => 'uploads/transaction_images/avatar.jpg',
                 'status' => 'inprogress',
                 'usdt_address' => $usdt_address,
                 'purpose_id' => 1,
             ];




            $t = Transaction::create($attr);


            request()->user()->update(['usdt_address' => $usdt_address]);




            return json_encode([

               'errors' => false,
               'data' => 'your withdrawal is in progress',

            ]);


















    }
}
