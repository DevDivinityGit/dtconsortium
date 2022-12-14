<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserDetailsController extends Controller
{
    public function getDetails($id)
    {


        $user = User::find($id);


        $user->tr = $user->transactions;
        $user->tasked = $user->tasks;



        return $user;

    }
}
