<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Gate;
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
            $user->update(['password' => $r->password]);
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
            $errors['name'] = 'Number field is required';
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

                $user->update(['current_balance' => $user->current_balance += $referralAmount]);



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


        return json_encode(['errors' => false, 'data' => $user, 'token' => $token]);


    }


    public function login ()
    {










        $email = request()->email;
        $password = request()->password;
        $number = request()->number;

        $data = [];
//           FORM VALIDATION




        if(!empty($number)) {


            if(!User::where('number', $number)->first()) {
                $data['number'] = 'input number was wrong';


            }




        } else {


            if(empty($email)) {
                $data['email'] = 'Email field is required';
            }elseif(!User::where('email', $email)->first()) {
                $data['email'] = 'Email address doesnt exist';

            }




        }














        if(empty($password)) {
            $data['password'] = 'Password field is required';
        }


        $user = User::where('email', $email)->first();
        $numberUser = User::where('number', $number)->first();

        if($user) {

            if(!password_verify($password, $user->password)) {
                 $data['password'] = 'Password do not match';



            }







        } else if($numberUser) {
            $user = $numberUser;


            if(!password_verify($password, $user->password)) {
                $data['password'] = 'Password do not match';



            }






        }



























//        elseif($obj = User::where('email', $email)->first()) {
//            if(!password_verify($password, $obj->password)) {
//                $data['password'] = 'Password do not match';
//
//            }
//        }

        if(count($data) > 0) {

            return json_encode(['errors' => true, 'data' => $data]);









        }





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

        if(Gate::allows('is-admin')) {

            return User::where('role_id', '!=', 1)->get();


        }

        return [];

    }

    public function destroy($id)
    {

        $user = User::find($id);
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
