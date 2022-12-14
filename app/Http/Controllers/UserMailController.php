<?php

namespace App\Http\Controllers;

use Dompdf\Exception;
use Illuminate\Http\Request;
use App\User;
use App\VerifyPassword;
use Illuminate\Support\Facades\Mail;


class UserMailController extends Controller
{



    public function changPassword(Request $r)
    {
        $errors = [];

        if(empty($r->password)) {
            $errors[] = 'password field is required';
        }

        if(empty($r->email)) {
            $errors[] = 'Email field is required';
        }


        if(count($errors)>0) {



            return json_encode(['errors' => true, 'data' => $errors]);
        }




        $code = VerifyPassword::where('user_id', $r->user()->id)->first();


         if(!$code) {

             $errors[] = 'verification code was not sent';


         }elseif($code->verified !== 1) {

        $errors[] = 'verification code expired';


    }














        if(count($errors)>0) {



            return json_encode(['errors' => true, 'data' => $errors]);
        }




//        $code->update(['verified' => 1]);





         if($r->user()->update(['password' => bcrypt($r->password)])) {



             $code->delete();


             return json_encode(['errors' => false, 'data' => $r->user()]);


         }















    }


    public function verify(Request $r)
    {

        $code =  $r->code;
        $email =  $r->email;
        $pass = $r->password;
        if(empty($code)) return json_encode(['errors' => true, 'data' => 'code field is required']);
        if(empty($email)) return json_encode(['errors' => true, 'email field is required']);
        if(empty($pass)) return json_encode(['Password field is required']);



        $verify = VerifyPassword::where('code', $code)
            ->where('email', $email)
            ->first();


        if($verify) {

            if($verify->verified === 1) {
                $verify->delete();

                return json_encode(['errors' => true, 'data' => ['verification code expired']]);





            }elseif($verify->verified === 0) {

                $verify->update(['verified' => 1]);

                $user = User::where('email', $email)
                    ->first()
                    ->update(['password' => bcrypt($pass)]);
                if(!$user)  {
                    return json_encode(['errors' => true, 'data' => "Something went wrong"]);

                }



                return json_encode(['errors' => false, 'data' => $user]);





            }







//            if($verify->update(['verified' => 1])) {
//
//                return json_encode(['errors' => false, 'data' => $verify]);
//
//
//            } else {
//
//
//
//
//            }






        }


        return json_encode(['errors' => true, 'data' => 'verification code do not match']);





    }





    public function reset(Request $r)
    {


        $email =  $r->email;
        $errors = [];


        if(empty($email)) {
            $errors[] = 'email address is required';


        }elseif(User::where('email', $email)->first()) {


            $GLOBALS['email'] = $email;


            $digits = 5;
            $rand = rand(pow(10, $digits - 1), pow(10, $digits) - 1);









//            $_SESSION['current_code'] = $rand;
//            $_SESSION['current_email'] = $email;



            foreach(VerifyPassword::where('email', $email)->get() as $item) {

                $item->delete();
            }



            VerifyPassword::create([
                'email' => $email,
                'code' => $rand,
                'verified' => 0,
            ]);












             Mail::send("user_mail", ['name' => 'Reset'], function ($msg) {

                 $msg->to($GLOBALS['email'])
                     ->subject('Reset password');
                 $msg->from("theuser70yz@gmail.com");


             });











        } else {
            $errors[] = 'no account found';
        }




        if(count($errors)>0) {


            return json_encode([
               'errors' => true,
               'data' => $errors,

            ]);
        }







        return json_encode([
            'errors' => false,
            'data' => $rand,

        ]);













    }
}
