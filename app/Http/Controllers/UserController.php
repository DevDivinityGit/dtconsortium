<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Gate;
use App\Transaction;
class UserController extends Controller
{



    public function updateUserByAdmin($id)
    {




        $user = User::find($id);

        $r =  request();

        if(!empty($r->name)) {

            $user->update(['name' => $r->name]);
        }


        if(!empty($r->email)) {
            $user->update(['email' => $r->email]);
        }
        if(!empty($r->password)) {
            $user->update(['password' => bcrypt($r->password)]);
        }


        if(!empty($r->current_balance)) {
            $user->update(['current_balance' => (int)$r->current_balance]);
        }


        if(!empty($r->real_name)) {
            $user->update(['real_name' => $r->real_name]);
        }








        if(!empty($r->number)) {

            $n = User::where('number', (int)$r->number)->first();
            if($n) {

                if($user->number !== $n->number) {

                    return 401;


                }



            }



            $user->update(['number' => (int)$r->number]);
        }















        if($r->image) {
            $imageName = time().'.'.$r->image->getClientOriginalExtension();
            $r->image->move('uploads/images/', $imageName);
            unlink($user->image);

            $user->update(['image' => 'uploads/images/'.$imageName]);
        }











        return 200;





    }


    public function show($id)
    {
        $user = User::find($id);
        return $user;
    }


    public function register()
    {


         $referralAmount = 10;

        $name = request()->name;
//        $image = request();
        $email = request()->email;
        $password = request()->password;
        $number = request()->number;
        $invitationCode = request()->invitation_code;

        $errors = [];
//           FORM VALIDATION

        if(empty($name)) {
            $errors['number'] = 'Email field is required';
        }





        if(empty($number)) {
            $errors['number'] = 'Number field is required';
        } elseif(User::where('number', (int)$number)->first()) {

            $errors['number'] = 'Number already in use try a different number';


        }








        if(empty($email)) {
            $errors['email'] = 'Email field is required';
        }
        if(empty($password)) {
            $errors['password'] = 'Password field is required';
        }


//        IMAGE UPLOAD

          $request = request();

        if ($request->image) {
        $folderPath = "uploads/";

        $base64Image = explode(";base64,", $request->image);
        $explodeImage = explode("image/", $base64Image[0]);
        $imageType = $explodeImage[1];
        $image_base64 = base64_decode($base64Image[1]);
        $file = $folderPath . uniqid() . '.'.$imageType;

        file_put_contents($file, $image_base64);




    }
//        END IMAGE UPLOAD


        if(User::where('email', $email)->first()) {

            $errors['email'] = 'Email address already exists';




        }










        if(count($errors) > 0) {


            return json_encode(['errors' => true, 'data' => $errors]);





        }



        if($invitationCode) {

            $user = User::where('invitation_code', $invitationCode)->first();

            if($user) {

//                $user->update(['current_balance' => $user->current_balance += $referralAmount]);



                switch ($user->plan->name)
                {

                    case 'VIP1':
                        $amount = 15;
                        $user->update(['current_balance' => $user->current_balance += $amount]);
                        break;





                    case 'VIP2':
                        $amount = 45;
                        $user->update(['current_balance' => $user->current_balance += $amount]);
                        break;




                    case 'VIP3':
                        $amount = 130;
                        $user->update(['current_balance' => $user->current_balance += $amount]);
                        break;



                    case 'VIP4':
                        $amount = 250;
                        $user->update(['current_balance' => $user->current_balance += $amount]);
                        break;



                    case 'VIP5':
                        $amount = 500;
                        $user->update(['current_balance' => $user->current_balance += $amount]);
                        break;


                    case 'VIP6':
                        $amount = 1000;
                        $user->update(['current_balance' => $user->current_balance += $amount]);
                        break;


                    case 'VIP7':
                        $amount = 2000;
                        $user->update(['current_balance' => $user->current_balance += $amount]);
                        break;








                }



            }






        }













//        CREATE USER
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'image' => isset($file) ? $file : 'uploads/images/avatar.jpg',
            'number' => $number,
            'invitation_code' => $this->generateRandomString(),
            'invitation_code_verify' => $invitationCode,


        ]);


//        END CREATE USER


       $token = $user->createToken('the token')->accessToken;




        unset($user->tokens);
        $user->token = $token;


        return json_encode(['errors' => false, 'data' => $user]);


    }


    public function login ()
    {










//        $email = request()->email;
        $password = request()->password;
        $number = request()->number;

        $data = [];
//           FORM VALIDATION



//
//        if(empty($email)) {
//
//            return json_encode(['errors' => true, 'data' => 'email field is required']);
//
//
//        }


        if(empty($password)) {

            return json_encode(['errors' => true, "password  field is required"]);


        }




        if(empty($number)) {

            return json_encode(['errors' => true, "number  field is required"]);


        }






        $user = User::where('number', (int)$number)->first();

        if(!$user) {


            return json_encode(['errors' => true, "number do not match"]);




        } else {




                if(!password_verify($password, $user->password)) {
                    return json_encode(['errors' => true, "Password do not match"]);




                }












//            if(!empty($number)) {
//
//                if(!User::where('email', $email)->where('number', $number)->first()) {
//                    return json_encode(['errors' => true, "Number do not match"]);
//
//
//
//
//                }
//
//
//
//
//            }







        }

















//
//
//        if(!empty($number)) {
//
//
//            if(!User::where('number', $number)->first()) {
//                $data['number'] = 'input number was wrong';
//
//
//            }
//
//
//
//
//        }elseif(empty($password)) {
//          $data['password'] = 'Password field is required';
//          }
//
//
//
//
//        else {
//
//
//            if(empty($email)) {
//                $data['email'] = 'Email field is required';
//            }elseif(!User::where('email', $email)->first()) {
//                $data['email'] = 'Email address doesnt exist';
//
//            }
//
//
//
//
//        }
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//        $user = User::where('email', $email)->first();
//        $numberUser = User::where('number', $number)->first();
//
//        if($user) {
//
//            if(!password_verify($password, $user->password)) {
//                 $data['password'] = 'Password do not match';
//
//
//
//            }
//
//
//
//
//
//
//
//        } else if($numberUser) {
//            $user = $numberUser;
//
//
//            if(!password_verify($password, $user->password)) {
//                $data['password'] = 'Password do not match';
//
//
//
//            }
//
//
//
//
//
//
//        }
//
//
//
//























//        elseif($obj = User::where('email', $email)->first()) {
//            if(!password_verify($password, $obj->password)) {
//                $data['password'] = 'Password do not match';
//
//            }
//        }

//        if(count($data) > 0) {
//
//            return json_encode(['errors' => true, 'data' => $data]);
//
//
//
//
//
//
//
//
//
//        }





//       return response()->json(['data', $user]);




//        CREATE ACCESS TOKEN
        $tokens = $user->tokens;
        if(count($tokens) > 0) {
            foreach($tokens as $token) $token->delete();
            $token = $user->createToken('Access token')->accessToken;
        } else {
            $token = $user->createToken('Access token')->accessToken;

        }



            unset($user->tokens);


        $user->token = $token;

        return json_encode(['errors' => false, 'data' => $user]);
















    }


    public function index ()
    {




                  $s = request()->search;
                if($s) {

                    return User::where('role_id', '!=', 1)->where('name', 'like', "%$s%")->paginate(request()->limit);



                }



            return User::where('role_id', '!=', 1)->paginate(request()->limit);












        return [];

    }

    public function destroy($id)
    {

        $user = User::find($id);




        $trs = Transaction::where('user_id', $user->id)->get();


        foreach($trs as $tr) {

            $tr->update(['is_deleted' => 1]);


        }





        if($user->delete()) {
            return User::where('role_id', '!=', 1)->get();
        }







        return 0;
    }


    public function store()
    {
        $r = request();
        if(empty($r->name) || empty($r->email) || empty($r->password) || empty($r->number)) {
            return 500;
        }

        $n = User::where('number', (int)$r->number)->first();
        if($n) {
            return 401;
        }







        if($r->image) {
            $imageName = time().'.'.$r->image->getClientOriginalExtension();
            $r->image->move('uploads/images/', $imageName);
        }

        $user = User::create([
            'name' => $r->name,
            'email' => $r->email,
            'password' => bcrypt($r->password),
            'image' => isset($imageName) ? 'uploads/images/'.$imageName : 'uploads/images/avatar.jpg',
            'invitation_code' => $this->generateRandomString(),
            'number' => $r->number,
        ]);

        if($user) {
            return 200;
        }





        return 500;
    }



    public  function generateRandomString($length = 20) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }










}
