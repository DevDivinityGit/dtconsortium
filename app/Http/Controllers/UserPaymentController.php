<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Address;
use App\Transaction;

class UserPaymentController extends Controller
{
    public function send()
    {
        $errors = [];
        $r = request();
//        if(empty($r->usdt_address)) {
//            $errors[] = 'usdt address field is required';
//            return json_encode(['error' => true, 'message' => $errors]);
//
//
//
//        } else {
//            if($r->usdt_address !== Address::first()->address) {
//
//                $errors[] = 'usdt address not found';
//                return json_encode(['error' => true, 'message' => $errors]);
//
//
//            }
//        }




        if(empty($r->image)) {
            $errors[] = 'image field is required';
            return json_encode(['error' => true, 'message' => $errors]);



        }




        if(empty($r->amount)) {
            $errors[] = 'amount field is required';
            return json_encode(['error' => true, 'message' => $errors]);



        }




        if(empty($r->transaction_id)) {
            $errors[] = 'transaction field is required';
            return json_encode(['error' => true, 'message' => $errors]);



        }







         $request = $r;
        $folderPath = "uploads/transaction_images/";

        $base64Image = explode(";base64,", $request->image);
        $explodeImage = explode("image/", $base64Image[0]);
        $imageType = $explodeImage[1];
        $image_base64 = base64_decode($base64Image[1]);
        $file = $folderPath . uniqid() . '.'.$imageType;

        file_put_contents($file, $image_base64);




          $tr = Transaction::create([
             'user_id' => $r->user()->id,
             'image' => $file,
             'amount' => $r->amount,
              'usdt_address' => $r->usdt_address,
              'transaction_id' => $r->transaction_id,
              'status' => 'inprogress',
              'purpose_id' => 2,



          ]);







        return json_encode([
           'errors' => false,
           'data' => $tr,
        ]);










    }
}
